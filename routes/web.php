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
})->name('welcome');

Route::post('crop-image-process','CropController@cropimageprocess')->name('cropimageprocess');
Route::post('crop-image-upload','CropController@cropimageupload')->name('cropimageupload');
Route::post('resize-image','ResizeController@resize')->name('resize');
Route::post('passport-size-photo','PassportsizeController@passportsize')->name('passportsize');
Route::post('passport-size-photo-for-printing','PassportprintController@passportprint')->name('passportprint');
Route::post('auto-or-id-size-photo','AutosizeController@autosize')->name('autosize');
Route::post('auto-or-id-size-photo-for-printing','AutoprintController@autoprint')->name('autoprint');
Route::post('change-image-extension-or-format','ChangetoController@changeto')->name('changeto');
Route::post('convert-text-to-image','TexttoimageController@texttoimage')->name('texttoimage');
Route::post('add-text-to-existing-image','AddtexttoimageController@addtexttoimage')->name('addtexttoimage');
Route::post('customize-photo-and-paper-for-printing','CustomprintController@customprint')->name('customprint');
Route::post('add-watermark-to-existing-image','WatermarkController@watermark')->name('watermark');
Route::post('remove-background','BackgroundController@backgroundupload')->name('background');

Route::get('upload-image-for-cropping-online','CropController@cropimageuploadpage')->name('cropimageuploadpage');
Route::get('crop-image','CropController@getcroppage')->name('getcroppage');
Route::get('resize-image','ResizeController@index')->name('resize');
Route::get('passport-size-photo','PassportsizeController@index')->name('passportsize');
Route::get('passport-size-photo-for-printing','PassportprintController@index')->name('passportprint');
Route::get('auto-or-id-size-photo','AutosizeController@index')->name('autosize');
Route::get('auto-or-id-size-photo-for-printing','AutoprintController@index')->name('autoprint');
Route::get('change-image-extension-or-format','ChangetoController@index')->name('changeto');
Route::get('convert-text-to-image','TexttoimageController@index')->name('texttoimage');
Route::get('add-text-to-existing-image','AddtexttoimageController@index')->name('addtexttoimage');
Route::get('customize-photo-and-paper-for-printing','CustomprintController@index')->name('customprint');
Route::get('add-watermark-to-existing-image','WatermarkController@index')->name('watermark');
Route::get('remove-background','BackgroundController@index')->name('background');
Route::get('/termsandconditions',function(){
  return view('termsandconditions');
})->name('termsandconditions');
Route::get('/privacypolicy',function(){
  return view('privacypolicy');
})->name('privacypolicy');
