<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

Route::get('admin/home', 'HomeController@index')->name('admin.home');

Route::group(['prefix'=>'admin','middleware'=>['admin']], function(){
    Route::get('/home2', function(){
        return 'aaaaaaa';
    });
});
