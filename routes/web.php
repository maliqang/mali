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

Route::get('/',"home\IndexController@index");

Route::get('/test','home\IndexController@test');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->name("admin.")->middleware('auth')->group(function (){
    Route::get('/index','Admin\IndexController@index')->name("index");
    Route::get("/welcome","Admin\ConfigController@welcome")->name("welcome");
    Route::get("/config",'Admin\ConfigController@index')->name("config");
    Route::post("/config/update","Admin\ConfigController@update")->name("config.update");
    Route::get('/lang','Admin\ConfigController@lang')->name('lang');
    Route::get("/template",'Admin\TemplateController@index')->name('template');
    Route::get("/template/create_html",'Admin\TemplateController@createHtml')->name('template.create_html');
    Route::post("/template/store_html",'Admin\TemplateController@storeHtml')->name('template.store.html');
    Route::get("/template/edit_html",'Admin\TemplateController@editHtml')->name('template.edit_html');
    Route::get("/template/css",'Admin\TemplateController@cssList')->name('template.css');
    Route::get("/template/create_css",'Admin\TemplateController@createCss')->name('template.create_css');
    Route::post("/template/store_css",'Admin\TemplateController@storeCss')->name('template.store.css');
    Route::get("/template/js",'Admin\TemplateController@jsList')->name('template.js');
    Route::post("/template/update_file",'Admin\TemplateController@updateFile')->name('template.update.file');


});
