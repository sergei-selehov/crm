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
    return redirect('login');
});

Route::get('/home', function () {
    return redirect('/table');
});

Auth::routes();

Route::group(['prefix' =>'admin', 'middleware' => ['admin']], function () {
    Route::get('/', function () { return view('admin/index'); });

});

//Route::get('import', 'CounterpartController@destroy');

Route::group(['middleware' => ['auth']], function () {
//    Route::get('counterparts', 'CounterpartController@index');
//    Route::get('edit/{id}', 'CounterpartController@edit');
//    Route::post('editData/{id}', 'CounterpartController@editPost');
//    Route::post('contact-face/{id}', 'CounterpartController@contactFace');
//    Route::post('search', 'CounterpartController@search');
//    Route::get('create', 'CounterpartController@create');
//    Route::post('createData', 'CounterpartController@createPost');
//    Route::post('searchCF', 'CounterpartController@searchContactFace');
//
//    Route::get('history','CounterpartController@history');
//    Route::get('contactFace', 'ContactFaceController@index');

    Route::get('table', array('as' => 'ajax', 'uses' => 'TableController@index'));
    Route::get('show/{id}', 'TableController@show');
    Route::post('addHistory/{id}', 'TableController@addHistory');
    Route::get('import', 'TableController@import');
    Route::post('searchTable', 'TableController@searchTable');
    Route::get('myHistory','TableController@myHistory');
});
