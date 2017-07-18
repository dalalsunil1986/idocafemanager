<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function getMenus(){
        $menus = DB::table('menus')->get();

        return view('menus.manageMenu',[
           'menus' => $menus
        ]);
    }
    public function getEditMenus($id){
        $menus = DB::table('menus')->get();
        $editMenu = DB::table('menus')->where('id', $id)->get();

        return view('menus.manageMenu',[
           'menus' => $menus,
            'editMenu' => $editMenu
        ]);
    }
    //POST
    public function postEditMenus(Request $req){
        DB::table('menus')->where('id', $req->input('menuId'))->update(['name' => $req->input('name'), 'price' => $req->input('price'), 'category' => $req->input('category')]);

        notify()->flash('Menu : '.$req->input('name').'. Sukses di Edit.', 'success');

        return redirect()->route('menus.manage');
    }
    public function postAddMenus(Request $req){
        $this->validate($req,[
           'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);

        $menu = new Menu([
            'name' => $req->input('name'),
            'price' => $req->input('price'),
            'category' => $req->input('category')
        ]);
        $menu->save();

        notify()->flash('Menu : '.$req->input('name').' Sukses ditambahkan.', 'success');

        return redirect()->route('menus.manage');
    }
}
