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


Route::get('test','admin\TestController@test');

Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'adminlogin'],function(){
	Route::group(['prefix'=>'product'],function(){
		Route::get('list','ProductController@listproduct')->name('productlist');
		Route::get('detail/{id}','ProductController@detailproduct')->name('detailproduct');
		Route::get('add','ProductController@add')->name('addproduct');
		Route::post('add','ProductController@postadd')->name('postaddproduct');
		Route::get('edit/{id}','ProductController@edit')->name('editproduct');
		Route::post('edit/{id}','ProductController@postedit')->name('posteditproduct');
		Route::get('delete/{id}','ProductController@deleteproduct')->name('deleteproduct');
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
		Route::get('delete/{id}','CategoryController@deletecate')->name('deletecate');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('list','UserController@list')->name('userlist');

		Route::get('add','UserController@add')->name('useradd');
		Route::post('add','UserController@postadd')->name('userpostadd');

		Route::get('edit/{id}','UserController@edit')->name('useredit');
		Route::post('edit/{id}','UserController@postedit')->name('userpostedit');
		Route::get('delete/{id}','UserController@delete')->name('userdelete');

	});
	
});


Route::get('admin/login','admin\UserController@login')->name('login');
Route::post('admin/login','admin\UserController@postlogin')->name('postlogin');
Route::get('admin/logout','admin\UserController@logout')->name('logout');


//////frontend
Route::get('/index','page\PageController@index')->name('page.index');

Route::get('/login','page\PageController@getlogin')->name('page.getlogin');
Route::post('/login','page\PageController@postlogin')->name('page.postlogin');

Route::get('/register','page\PageController@getregister')->name('page.getregister');
Route::post('/register','page\PageController@postregister')->name('page.postregister');

Route::get('logout','page\PageController@logout')->name('page.logout');
Route::get('contact','page\PageController@contact')->name('page.contact');
Route::get('detailcate/{id}','page\PageController@detailcate')->name('page.detailcate');
Route::get('detailproduct/{id}','page\PageController@detailproduct')->name('page.detailproduct');


// cart
	Route::get('cart','page\PageController@cart')->name('page.cart');
	Route::post('order','page\PageController@postorder')->name('page.order');
	Route::get('orderproduct/{idpro}/{idsize}/{quantity}','page\PageController@orderproduct')->name('page.ordercart');
	Route::get('cartshop','page\PageController@cartshop')->name('page.cartshop');

	Route::get('deletecart/{id}','page\PageController@deletecart')->name('page.deletecart');
