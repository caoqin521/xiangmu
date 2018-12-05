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

Route::get('/', function () {


    
    return view('home.welcome');
});






//后台的首页
Route::get('/admin', 'Admin\IndexController@index');
//友情链接
Route::resource('/admin/fri','Admin\FriController');

//视频管理
Route::resource('admin/video','Admin\VideoController');
//分类管理
Route::resource('/admin/type','Admin\TypeController');
//留言管理
Route::resource('/admin/advert','Admin\AdvertController');





