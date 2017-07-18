<?php

namespace App\Http\Controllers;

use App\finance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function getFinances(){
        $financesIncome = DB::select('SELECT * FROM finances WHERE type="income" AND MONTH(date)=MONTH(NOW())');
        $financesExpense = DB::select('SELECT * FROM finances WHERE type="expense" AND MONTH(date)=MONTH(NOW())');
        $totalIncome = DB::select('SELECT SUM(amount) as totalIncome FROM finances WHERE type="income" group by type');
        $totalExpense = DB::select('SELECT SUM(amount) as totalExpense FROM finances WHERE type="expense" group by type');

        return view('finances.finances',[
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'financesIncome' => $financesIncome,
            'financesExpense' => $financesExpense
        ]);
    }
    public function postAddFinances(Request $req){
        $this->validate($req,[
            'amount' => 'required|min:3',
            'desc' => 'required|min:4',
            'type' => 'required'
        ]);

        $finance = new finance([
            'amount' => $req->input('amount'),
            'description' => $req->input('desc'),
            'type' => $req->input('type'),
            'date' => Carbon::now()
        ]);

        $finance->save();

        notify()->flash('Transaksi : "'.$req->input('desc').'" Sukses ditambahkan.', 'success');

        return redirect()->route('manage.finances');
    }
}
