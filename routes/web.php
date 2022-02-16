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

Route::resource('mainans', 'MainanController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/dashboard', 'DashboardController@index');
Route::resource('/admin/product', 'ProductController');
Route::resource('/admin/category', 'CategoryController');
Route::resource('/admin/customers', 'CustomerController');
Route::resource('/admin/pekerja', 'SupplierController');
Route::resource('/admin/productin', 'ProdukMasukController');
Route::resource('/admin/productout', 'ProdukKeluarController');
<<<<<<< HEAD

Route::resource('/admin/booking', 'BookingController');

=======
Route::get('/exportProductKeluarAll','ProdukKeluarController@exportProductKeluarAll')->name('exportPDF.productKeluarAll'); 
Route::get('/exportProductMasukAll','ProdukMasukController@exportProductMasukAll')->name('exportPDF.productMasukAll'); 
>>>>>>> 6da6d11a515957b3bb637ea50874ec22538a1b7f

