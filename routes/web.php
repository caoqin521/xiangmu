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
//视频封面上传
Route::any('admin/videos/{id}','Admin\VideosController@upload');
//视频搜索
Route::any('/admin/videoss/sousuo','Admin\VideosController@sousuo');
//视频切换分类
Route::get('/admin/videoss/fenlei/{id}','Admin\VideosController@fenlei');
//分类管理
Route::resource('/admin/type','Admin\TypeController');
//留言管理
// Route::resource('/admin/advert','Admin\AdvertController');
Route::resource('/admin/gbook','Admin\GbookController');
//回复留言
Route::resource('/admin/agreplay','Admin\AgreplayController');




