<?php

Route::get('/','WelcomeController@index');
Route::get('/categoryview/{id}' , 'WelcomeController@category');
Route::get('/contract','WelcomeController@contract');
Route::get('/product/details/{id}','WelcomeController@productdetails');
 

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware'=>'AuthenticateMiddleware'],function(){

/*Catagory Info*/

Route::get('/category/add','CategoryController@createCategory');
Route::post('/category/save','CategoryController@storeCategory');
Route::get('/category/manage','CategoryController@manageCategory');
Route::get('/category/edit/{id}','CategoryController@editCategory');
Route::get('/category/delete/{id}','CategoryController@deleteCategory');
Route::post('/category/update/','CategoryController@updateCategory');
/*Catagory Info*/

/*Manufacture Info */

Route::get('/manufacture/add','ManufactureController@createManufacture');
Route::get('/manufacture/manage','ManufactureController@manageManufacture');
Route::get('/manufacture/edit/{id}','ManufactureController@editManufacture');
Route::get('/manufacture/delete/{id}','ManufactureController@deleteManufacture');
Route::post('/manufacture/save','ManufactureController@storeManufacture');
Route::post('/manufacture/update','ManufactureController@updateManufacture');

/*Manufacture Info */


/*Product Info*/
Route::get('/product/add','productController@createProduct');
Route::post('/product/save','productController@storeProduct');
Route::get('/product/manage','productController@manageProduct');
Route::get('/product/view/{id}','productController@viewProduct');
Route::get('/product/edit/{id}','productController@editProduct');
Route::get('/product/delete/{id}','productController@deleteProduct');
Route::post('/product/update/','productController@updateProduct');

/*Product Info*/


//User Info///

Route::get('/user/manage','UserController@manageUser');

//User Info//

});  
