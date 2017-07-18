<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //Get Section
    public function getIndex(){
        return view('index');
    }

    public function getEditUser($id){
        $users = DB::table('users')->get();
        $editUser = DB::table('users')->where('id',$id)->get();


        return view('user.manageUser',[
            'users' => $users,
            'editUser' => $editUser
        ]);
    }

    public function getManageUser(){
        $users = DB::table('users')->get();

        return view('user.manageUser',[
            'users' => $users
        ]);
    }

    public function getManageUser2($id){
        $users = DB::table('users')->get();

        return view('user.manageUser',[
            'users' => $users,
            'id' => $id
        ]);
    }

    public function getLogin(){
        return view('login');
    }
    public function getProfile(){
        return view('user.userProfile');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function getDeleteUser2($id){
        DB::table('users')->where('id', $id)->delete();

        notify()->flash('User has ben deleted.', 'success');

        return redirect()->route('user.manage');
    }

    public function getDeleteUser($id){

        notify()->flash('Delete User?', 'warning');

        return redirect()->route('user.delete.ask',['id'=>$id]);
    }
    //Post Section
    public function postEditUser(Request $req){
        DB::table('users')->where('id', $req->input('userId'))->update(['username' => $req->input('username'), 'password' => bcrypt($req->input('password')), 'type' => $req->input('type') ]);

        notify()->flash('User : '.$req->input('username').'. Sukses di Edit.', 'success');

        return redirect()->route('user.manage');
    }

    public function postAddUser(Request $req){
        $this->validate($req, [
           'username' => 'required|min:4',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'username' => $req->input('username'),
            'password' => bcrypt($req->input('password')),
            'type' => $req->input('type')
        ]);
        $user->save();

        notify()->flash('User : '.$req->input('username').' Sukses ditambahkan.', 'success');

        return redirect()->route('user.manage');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'username' => 'required|min:4',
            'password' => 'required|min:4'
        ]);

        if(Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])){
            return redirect()->route('manage.order');
        }
        return redirect()->back();
    }
}
