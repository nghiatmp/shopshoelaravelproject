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
    return view('welcome');
});


Route::get('test','TestController@test');

Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'product'],function(){
		Route::get('list','ProductController@listproduct')->name('productlist');
		Route::get('detail/{id}','ProductController@detailproduct')->name('detailproduct');
		Route::get('add','ProductController@add')->name('addproduct');
		Route::post('add','ProductController@postadd')->name('postaddproduct');
		Route::get('edit/{id}','ProductController@edit')->name('editproduct');
		Route::post('edit/{id}','ProductController@postedit')->name('posteditproduct');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('type/{id}','AjaxController@gettype');
		
	});
	Route::group(['prefix'=>'category'],function(){
		Route::get('list','CategoryController@list')->name('categorylist');
		Route::get('add','CategoryController@add')->name('categoryadd');
		Route::post('add','CategoryController@postadd')->name('postadd');

		Route::get('edit/{id}','CategoryController@edit')->name('categoryedit');
		Route::post('edit/{id}','CategoryController@postedit');
	});
});