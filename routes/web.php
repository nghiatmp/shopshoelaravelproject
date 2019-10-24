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
    // return view('pages.index');
    return redirect(route('page.index'));
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
		Route::get('approved/{id}','AjaxController@approved');
		Route::get('addbill/{id}','AjaxController@addbill');
		Route::get('addbillSize/{id}','AjaxController@addbillSize');
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

	Route::group(['prefix'=>'staff'],function(){
		Route::get('infor','UserController@inforStaff')->name('infor');
		Route::get('update','UserController@updateStaff')->name('update');
		Route::post('update','UserController@postupdateStaff')->name('post.update');
	});

	Route::group(['prefix'=>'billex'],function(){
		Route::get('list','BillExportController@list')->name('billex-list');
		Route::get('detailbillex/{id}','BillExportController@detailbillex')->name('detailbillex');
		Route::get('approved','BillExportController@approved')->name('approved');
	});

	Route::group(['prefix'=>'billim'],function(){
		Route::get('list','BillImportController@list')->name('billim-list');
		Route::get('detail-import/{id}','BillImportController@detailimport')->name('billim-detail');

		Route::get('add','BillImportController@add')->name('billim-add');
		Route::post('addbill','BillImportController@postaddbill')->name('billim-postadd');

		Route::get('add-detail-bill/{id}','BillImportController@adddetail')->name('billim-adddetail');
		Route::post('add-detail-bill','BillImportController@postdetailaddbill')->name('billim-postadddetail');
	});
	
});


Route::get('admin/login','admin\UserController@login')->name('login');
Route::post('admin/login','admin\UserController@postlogin')->name('postlogin');
Route::get('admin/logout','admin\UserController@logout')->name('logout');


// theo doi don hang
Route::group(['namespace'=>'page'],function(){

		Route::get('/index','PageController@index')->name('page.index');

		Route::get('/login','PageController@getlogin')->name('page.getlogin');
		Route::post('/login','PageController@postlogin')->name('page.postlogin');

		Route::get('/register','PageController@getregister')->name('page.getregister');
		Route::post('/register','PageController@postregister')->name('page.postregister');

		Route::get('logout','PageController@logout')->name('page.logout');
		Route::get('contact','PageController@contact')->name('page.contact');
		Route::get('detailcate/{name}~{id}','PageController@detailcate')->name('page.detailcate');
		Route::get('detailproduct/{slug}~{id}','PageController@detailproduct')->name('page.detailproduct');


		// cart
		Route::get('cart','PageController@cart')->name('page.cart');
		Route::post('order','PageController@postorder')->name('page.order');
		Route::get('orderproduct/{idpro}/{idsize}/{quantity}','PageController@orderproduct')->name('page.ordercart');
		Route::get('cartshop','PageController@cartshop')->name('page.cartshop');

		Route::get('deletecart/{id}','PageController@deletecart')->name('page.deletecart');
		Route::post('updatecart','PageController@updatecart')->name('page.updatecart');

		// giao dien dat hang
		Route::get('order','PageController@order')->name('page.order');

		//dat hang
		Route::post('make-bill','PageController@makebill')->name('make-bill');

		//user
		Route::group(['middleware'=>'ckeck.user.edit'],function(){
			Route::get('infor','PageController@infor')->name('page.infor');
			Route::get('update','PageController@update')->name('page.update');

			Route::post('update','PageController@postupdate')->name('page.postupdate');
		});


		//comment
		Route::group(['middleware'=>'ckeck.user.edit'],function(){
			Route::post('comment','PageController@comment')->name('page.comment');
		});


		//SEARCH
		Route::get('search','PageController@search')->name('page.search');
		

});


Route::group(['namespace'=>'page','middleware'=>'ckeck.user.order'],function(){

		// theo doi don hang
		Route::get('inforoder/{id}','PageController@inforoder')->name('page.inforoder');
		Route::get('delete-order/{id}','PageController@deleteOrder')->name('page.delete-order');

		Route::get('detail-infor-order/{id}','PageController@detailinfororder')->name('page.detailinfororder');

});

