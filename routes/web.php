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

$model = 'Home';
Route::get('/', $model.'\IndexController@index');

Route::group(['prefix'=>'/menu','namespace' => $model],function (){

    //主页面
    Route::get('/index','MenuController@index');
//添加页面
    Route::get('/','MenuController@menu');
//    编辑页面
    Route::get('/edit/{id}','MenuController@update');
//    表单提交，修改
    Route::put('/','MenuController@update');
//    表单提交 添加
    Route::post('/','MenuController@add');
//    a标签提交 删除
    Route::get('/delete/{id}','MenuController@delete');
//  ajax 获取menu数组
    Route::get('/ajax-menu','MenuController@ajax_menu');
});


Route::group(['prefix'=>'/category','namespace' => $model],function (){

    Route::get('/index','CategoryController@index');

    Route::get('/','Categorytroller@menu');
    Route::put('/','CategoryController@update');
    Route::post('/{id}','CategoryController@add');
    Route::delete('/{id}','CategoryController@delete');

    Route::get('/ajax-menu','MenuController@ajax_menu');
});


Route::group(['csrf'=>false],function (){
    Route::post('file/upload','FileController@upload');
});


Route::group(['prefix'=>'demo','namespace' => 'Home'],function (){
    Route::get('/','DemoController@index');
    Route::get('/upload','DemoController@upload');

});
