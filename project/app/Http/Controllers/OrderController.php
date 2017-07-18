<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderMenu;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //GET
    public function getManageOrder(){
        $foods = DB::table('menus')->where('category', 'foods')->get();
        $drinks = DB::table('menus')->where('category','drinks')->get();
        $tables = DB::table('tables')->get();

        $orders = DB::select('select * from orders where checkout="null"');
        $orderController = new OrderController();

        return view('order.manageOrder',[
            'foods' => $foods,
            'drinks' => $drinks,
            'tables' => $tables,
            'orderController' => $orderController,
            'orders' => $orders
        ]);
    }

    public function getOrderCustomer(){
        $foods = DB::table('menus')->where('category', 'foods')->get();
        $drinks = DB::table('menus')->where('category','drinks')->get();
        $tables = DB::table('tables')->get();

        $orders = DB::select('select * from orders where checkout="null"');
        $orderController = new OrderController();

        return view('order.orderCustomer',[
            'foods' => $foods,
            'drinks' => $drinks,
            'tables' => $tables,
            'orderController' => $orderController,
            'orders' => $orders
        ]);
    }

    public function getOrderMenu($idOrder){
        $orderMenus = DB::select('SELECT order_menus.id, order_menus.qty, menus.name, menus.price FROM order_menus INNER JOIN menus on order_menus.menu_id = menus.id and order_menus.order_id= :id',['id' => $idOrder]);

        return $orderMenus;
    }
    public function getCompletedOrder(){
        $completedOrder = DB::select('select * from orders where checkout!="null" order by id DESC LIMIT 10');

        return $completedOrder;
    }
    public function getOrderList(){
        $orders = DB::select('select * from orders where status="Cooking"');
        $orderController = new OrderController();

        return view('order.orderList', [
            'orderController' => $orderController,
           'orders' => $orders
        ]);
    }
    public function getDeliverOrder($id){
        DB::table('orders')->where('id', $id)->update(['status' => 'Delivered']);

        notify()->flash('Order Delivered','success');

        return redirect()->route('list.order');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getReports(){
        $orderReports = DB::select('SELECT date, SUM(total_price) AS total_income FROM orders GROUP BY date ORDER BY date DESC LIMIT 7');
        $orderReports = array_reverse($orderReports);
        $peopleCountReports = DB::select('SELECT date, SUM(people_count) AS total_people FROM orders GROUP BY date DESC LIMIT 7');
        $peopleCountReports = array_reverse($peopleCountReports);
        $todayIncome = DB::select('SELECT SUM(total_price) AS todays_income FROM orders WHERE date = date(now()) GROUP BY date');
        $yesterdayIncome = DB::select('SELECT SUM(total_price) AS yesterdays_income FROM orders WHERE date = date(now()-INTERVAL 1 DAY) GROUP BY date');
        $bestFoods = DB::select("select menu_id,menus.name,count(menu_id) as totalFoods from order_menus inner join menus on order_menus.menu_id = menus.id and menus.category = 'foods' group by menu_id,menus.name");
        $bestDrinks = DB::select("select menu_id,menus.name,count(menu_id) as totalDrinks from order_menus inner join menus on order_menus.menu_id = menus.id and menus.category = 'drinks' group by menu_id,menus.name");
        $allReports = DB::table('orders')->select(DB::raw('year(date) as year, month(date) as month, SUM(total_price) AS total_income'))->groupBy(DB::raw('month(date)'))->orderBy(DB::raw('month(date)','date'),'desc')->paginate(10);
        $dailyReports = DB::table('orders')->select(DB::raw('date, SUM(total_price) AS total_income'))->groupBy('date')->orderBy('date','desc')->paginate(10);
        

        return view('reports.reports',[
            'allReports' => $allReports,
            'dailyReports' => $dailyReports,
            'yesterdayIncome' => $yesterdayIncome,
            'orderReports' => $orderReports,
            'todayIncome' => $todayIncome,
            'bestFoods' => $bestFoods,
            'bestDrinks' => $bestDrinks,
            'peopleCountReports' => $peopleCountReports
        ]);
    }

    //POST
    public function postPayOrder(Request $req){
        $minute = Carbon::now('Asia/Jakarta')->minute;
        $hour = Carbon::now('Asia/Jakarta')->hour;
        $idOrder = $req->input('idOrder');
        $order = DB::table('orders')->where('id', $idOrder)->get();
        $cashBack = ($req->input('amountMoney'))-($order['0']->total_price);

        if($cashBack>0){
            DB::table('orders')->where('id', $idOrder)->update(['checkout' => $hour.':'.$minute]);
            notify()->flash('Cashback : '.$cashBack, 'success');
        }else{
            notify()->flash('Insufficient Money!', 'error');
        }

        return redirect()->route('manage.order');


    }
    public function postManageOrder(Request $req){
        //Date
        $minute = Carbon::now('Asia/Jakarta')->minute;
        $hour = Carbon::now('Asia/Jakarta')->hour;
        $today = Carbon::now('Asia/Jakarta');
        //end-Date
        $totalPrice = 0;

        //Total Price
        //FOODS
        $foods = $_POST['foods'];
        foreach ($foods as $food){
            if($food['qty']>0){
                //Save Order Menus
                if((DB::table('orders')->count())>0){
                    $order_id = DB::select('select id from orders order by id desc limit 1');
                    $orderMenu = new OrderMenu([
                        'order_id' => (($order_id['0']->id)+1),
                        'menu_id' => $food['id'],
                        'qty' => $food['qty']
                    ]);
                    $orderMenu->save();
                }else{
                    $orderMenu = new OrderMenu([
                        'order_id' => '1',
                        'menu_id' => $food['id'],
                        'qty' => $food['qty']
                    ]);
                    $orderMenu->save();
                }
                $foods = DB::table('menus')->where('id', $food['id'])->get();
                $totalPrice = $totalPrice + (($foods['0']->price)*($food['qty']));
            }
        }

        //DRINKS
        $drinks = $_POST['drinks'];
        foreach ($drinks as $drink){
            if($drink['qty']>0){
                //Save Order Menus
                if((DB::table('orders')->count())>0){
                    $order_id = DB::select('select id from orders order by id desc limit 1');
                    $orderMenu2 = new OrderMenu([
                        'order_id' => (($order_id['0']->id)+1),
                        'menu_id' => $drink['id'],
                        'qty' => $drink['qty']
                    ]);
                    $orderMenu2->save();
                }else{
                    $orderMenu2 = new OrderMenu([
                        'order_id' => '1',
                        'menu_id' => $drink['id'],
                        'qty' => $drink['qty']
                    ]);
                    $orderMenu2->save();
                }
                $drinks = DB::table('menus')->where('id', $drink['id'])->get();
                $totalPrice = $totalPrice + (($drinks['0']->price)*($drink['qty']));
            }
        }


        if($req->input('theOption')=='eatHereGroup'){
            //VALIDATION
            $this->validate($req, [
                'name' => 'required|min:3',
                'people' => 'required',
                'tableNumber' => 'required'
            ]);

            DB::table('tables')->where('id', $req->input('tableNumber'))->update(['status' => 'used']);

            //MAKE NEW ORDER
            $order = new Order([
                'customer_name' => $req->input('name'),
                'people_count' => $req->input('people'),
                'date' => $today->toDateString(),
                'total_price' => $totalPrice,
                'table_number' => $req->input('tableNumber'),
                'user_id' => isset(Auth::user()->id) ? Auth::user()->id : '0',
                'checkin' => $hour.':'.$minute,
                'checkout' => 'null'
            ]);
            $order->save();
        }else{
            $this->validate($req, [
                'name' => 'required|min:3',
                'people' => 'required'
            ]);

            $order = new Order([
                'customer_name' => $req->input('name'),
                'people_count' => $req->input('people'),
                'date' => $today->toDateString(),
                'total_price' => $totalPrice,
                'table_number' => '0',
                'user_id' => isset(Auth::user()->id) ? Auth::user()->id : '0',
                'checkin' => $hour.':'.$minute,
                'checkout' => 'null'
            ]);
            $order->save();
        }


        if(isset(Auth::user()->id)){
            return redirect()->route('manage.order');
        }
        else{

            notify()->flash('Order sukses!', 'success');
            return redirect()->route('index');
        }

    }
    public function postCreateIncomeReports(Request $req){

    }

}
