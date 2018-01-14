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
    return view('home');
});
Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/home', 'AdminController@getHome')->name('admin.home_admin');
Route::post('/admin/valid', 'AdminController@valid')->name('admin.valid');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/','HomeController@index');
});
Route::get('/home/detailbarang/{id}', 'HomeController@getDetailBarang')->name('detail_barang_view');
Route::post('/home/isikeranjang/{id}', 'HomeController@addKeranjang')->name('isi_keranjang');
Route::get('/home/listkeranjang', 'HomeController@listKeranjang')->name('list_keranjang');
Route::get('/home/delete/{nama}', 'HomeController@deleteListKeranjang')->name('delete_list_keranjang');
Route::get('/home/submit/{total}', 'HomeController@submitKeranjang')->name('submit_keranjang');
Route::get('/home/cetaknota/{uuid}', 'HomeController@cetak_nota')->name('cetak_nota');
Route::get('/searchajax', 'HomeController@searchajax')->name('searchajax');
Route::get('/home/hasilpencarian', 'HomeController@getHasilPencarian')->name('hasil_pencarian');

Route::get('/admin/tabel', 'AdminController@getTabel')->name('admin.tabel');
Route::get('/admin/statistik', 'AdminController@getStatistik')->name('admin.statistik');
Route::get('/admin/addView', 'AdminController@addBarang')->name('admin.addView');
Route::post('/admin/add', 'AdminController@store')->name('admin.store');
Route::get('/admin/updateView/{id}', 'AdminController@getUpdateView')->name('admin.updateView');
Route::post('/admin/update', 'AdminController@update')->name('admin.update');
Route::get('/admin/delete/{id}', 'AdminController@delete')->name('admin.delete');
Route::get('/admin/user', 'AdminController@getUser')->name('admin.user');
Route::get('/admin/user/delete/{id}', 'AdminController@deleteUser')->name('admin.deleteUser');
Route::get('/admin/banner', 'AdminController@getListBanner')->name('admin.banner');
Route::get('/admin/banner/delete/{nama}', 'AdminController@deleteBanner')->name('admin.deleteBanner');
Route::get('/admin/banner/addView', 'AdminController@addBannerView')->name('admin.addBannerView');
Route::post('/admin/banner/addBanner', 'AdminController@addBanner')->name('admin.addBanner');
Route::get('/admin/logout', 'AdminController@logoutAdmin')->name('logout_admin');
Route::get('admin/status/{id}', 'AdminController@gantiStatus')->name('ganti_status');
