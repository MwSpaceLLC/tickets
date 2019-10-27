<?php

/**
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 */

// TODO: Must refactoring with add method RouteServicesProvider

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['test'])->group(function () {

    Route::get('/test.mail.ticket.reply/{email}', 'HomeController@testmail')->name('test.mail.ticket.reply');

});

/** @administration ===================================================== */

Route::middleware(['admincheck', 'checkroles'])->group(function () {
    Route::get('/departments', 'AdminController@departments')->name('departments');

    Route::post('/new/department', 'AdminController@newdepartment')->name('new.departments');

    Route::get('/department/{department}/status/{status}', 'AdminController@departmentChange')->name('department.change');

    Route::get('/department/{department}/manage', 'AdminController@departmentManage')->name('department.manage');

    Route::get('/users', 'AdminController@users')->name('users');

    Route::get('/user/{user}/status/{active}', 'AdminController@userChange')->name('users.change');

    Route::get('/user/{user}/manage', 'AdminController@userManage')->name('users.manage');

    Route::post('/user/{user}/update', 'AdminController@userUpdate')->name('users.update');

    // Add Piper
    Route::post('/mail/add/pipe', 'PipeController@addServer')->name('pipe.add');

    Route::get('/pipe/{pipe}/status/{active}', 'PipeController@piperChange')->name('pipe.status');

    Route::get('/pipe/{pipe}/department/{department}', 'PipeController@piperDepartment')->name('pipe.department');

    // Route for test

    Route::get('/http/test/mail', 'TestController@testMail')->name('test.mail');

    Route::get('/http/cron/invoke', 'TestController@testPiper')->name('test.piper');

});

/** @administration ===================================================== */


Route::middleware('checkroles')->group(function () {

    /** @tickets ===================================================== */

    Route::post('/@editorjs/image', 'EditorjsController@image')->name('editorjs.image');

    Route::post('/@editorjs/attaches', 'EditorjsController@attaches')->name('editorjs.attaches');

    Route::get('/@editorjs/link', 'EditorjsController@link')->name('editorjs.link');

    Route::post('/@editorjs/save/ticket/{id}', 'EditorjsController@save')->name('editorjs.save');

    // tiny Update
    Route::post('/@tiny/save/ticket/{id}', 'TinyController@save')->name('tiny.save');


    Route::post('/new/ticket/open', 'TicketController@open')->name('ticket.open');

    Route::get('/status/{status}/ticket/{id}', 'TicketController@close')->name('ticket.close');

    Route::get('/tickets/{status?}', 'TicketController@list')->name('ticket.list');

    Route::get('/ticket/{id}', 'TicketController@show')->name('ticket.show');

    Route::post('/tickets/change/dp', 'TicketController@changeDp')->name('ticket.change');


    /** @tickets ===================================================== */

    Route::get('/settings', 'HomeController@settings')->name('settings');

});

