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
    return redirect('image');
});


Route::resource('image', 'ImageController');

Route::get('image/edit/{id}', function ($id) {
    return View('image_upload.editimage');
});
