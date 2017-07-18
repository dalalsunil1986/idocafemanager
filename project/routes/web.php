<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'OrderController@getOrderCustomer',
    'as' => 'index'
]);

//GET
Route::get('/login', [
    'uses' => 'UserController@getLogin',
    'as' => 'login',
    'middleware' => 'guest'
]);

Route::post('/makeOrder', [
    'uses' => 'OrderController@postManageOrder',
    'as' => 'make.order'
]);

//POST
Route::post('/login', [
    'uses' => 'UserController@postLogin',
    'as' => 'login',
    'middleware' => 'guest'
]);

//MIDDLEWARE AUTH GROUP
Route::group(['middleware' => 'auth'], function (){
    //MANAGE ORDER
    Route::group(['prefix' => 'order'], function (){

        //GET
        Route::get('/manage', [
            'uses' => 'OrderController@getManageOrder',
            'as' => 'manage.order'
        ]);
        Route::get('/list', [
           'uses' => 'OrderController@getOrderList',
            'as' => 'list.order'
        ]);
        Route::get('/deliver/{idOrder}', [
            'uses' => 'OrderController@getDeliverOrder',
            'as' => 'deliver.order'
        ]);


        //POST

        Route::post('/pay', [
            'uses' => 'OrderController@postPayOrder',
            'as' => 'pay.order'
        ]);
    });

    //REPORTS
    Route::group(['prefix' => 'reports'], function (){
        Route::get('/', [
            'uses' => 'OrderController@getReports',
            'as' => 'show.reports'
        ]);
    });

    Route::group(['prefix' => 'finances'], function (){
        Route::get('/manage', [
            'uses' => 'FinanceController@getFinances',
            'as' => 'manage.finances'
        ]);
        Route::post('/manage', [
            'uses' => 'FinanceController@postAddFinances',
            'as' => 'add.finances'
        ]);
    });

    Route::group(['prefix' => 'menus'], function (){
        Route::get('/manage', [
            'uses' => 'MenuController@getMenus',
            'as' => 'menus.manage'
        ]);

        Route::post('/manage', [
            'uses' => 'MenuController@postAddMenus',
            'as' => 'menus.manage'
        ]);

        Route::get('/edit/{id}', [
            'uses' => 'MenuController@getEditMenus',
            'as' => 'menu.edit'
        ]);
        Route::post('/edit', [
            'uses' => 'MenuController@postEditMenus',
            'as' => 'post.menu.edit'
        ]);
        Route::get('/delete/{id}', [
            'uses' => 'MenuController@getDeleteMenus',
            'as' => 'menu.delete'
        ]);
    });

    //USER
    Route::group(['prefix' => 'user'], function (){
        //GET
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);

        Route::get('/', [
            'uses' => 'UserController@getManageUser',
            'as' => 'user.index'
        ]);

        Route::get('/manage', [
            'uses' => 'UserController@getManageUser',
            'as' => 'user.manage'
        ]);

        Route::post('/manage', [
            'uses' => 'UserController@postAddUser',
            'as' => 'user.manage'
        ]);

        Route::get('/edit/{id}', [
           'uses' => 'UserController@getEditUser',
            'as' => 'user.edit'
        ]);

        Route::get('/delete/{id}', [
            'uses' => 'UserController@getDeleteUser',
            'as' => 'user.delete'
        ]);

        Route::get('/delete/confirmed/{id}', [
            'uses' => 'UserController@getDeleteUser2',
            'as' => 'user.delete.confirmed'
        ]);

        Route::get('/delete/ask/{id}', [
            'uses' => 'UserController@getManageUser2',
            'as' => 'user.delete.ask'
        ]);

        Route::post('/post/edit', [
            'uses' => 'UserController@postEditUser',
            'as' => 'post.user.edit'
        ]);

        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);

        //POST
    });
});
