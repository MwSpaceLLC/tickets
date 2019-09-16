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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** @administration ===================================================== */

Route::middleware(['admincheck','checkroles'])->group(function () {
    Route::get('/departments', 'AdminController@departments')->middleware('admincheck')->name('departments');

    Route::post('/new/department', 'AdminController@newdepartment')->name('new.departments');

    Route::get('/users', 'AdminController@users')->middleware('admincheck')->name('users');

    Route::get('/user/{user}/status/{active}', 'AdminController@userChange')->middleware('admincheck')->name('users');

});

/** @administration ===================================================== */


Route::middleware('checkroles')->group(function () {

    /** @tickets ===================================================== */

    Route::post('/@editorjs/image', 'EditorjsController@image')->name('editorjs.image');

    Route::post('/@editorjs/attaches', 'EditorjsController@attaches')->name('editorjs.attaches');

    Route::get('/@editorjs/link', 'EditorjsController@link')->name('editorjs.link');

    Route::post('/@editorjs/save/ticket/{id}', 'EditorjsController@save')->name('editorjs.save');

    Route::post('/new/ticket/open', 'TicketController@open')->name('ticket.open');

    Route::get('/status/{status}/ticket/{id}', 'TicketController@close')->name('ticket.close');

    Route::get('/tickets/{status?}', 'TicketController@list')->name('ticket.list');

    Route::get('/ticket/{id}', 'TicketController@show')->name('ticket.show');

    /** @tickets ===================================================== */

    Route::get('/settings', 'HomeController@settings')->name('settings');

});

