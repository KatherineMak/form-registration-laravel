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

use App\Participaint;

Route::get('/', 'MainController@index');
Route::get('/members', 'MainController@members');

Route::get('/ajaxparticipaint', 'AjaxParticipaintController@index');
Route::get('/ajaxparticipaint/checksessionemail', 'AjaxParticipaintController@checkSessionEmail');
Route::get('/ajaxparticipaint/additional', 'AjaxParticipaintController@additional');
Route::get('/ajaxparticipaint/share', 'AjaxParticipaintController@share');

Route::post('/ajaxparticipaint/store', 'AjaxParticipaintController@store');
Route::post('/ajaxparticipaint/additsave', 'AjaxParticipaintController@additsave');

Route::get('/main/index', 'MainController@formIndex');
Route::get('/main/additional', 'MainController@formAdditional');
Route::get('/main/share', 'MainController@formShare');

Auth::routes();

Route::get('/home', [
    'middleware' => ['auth'],
    function () {
    $participaints = Participaint::orderBy('id', 'asc')->get();

    return view('home', [
        'participaints' => $participaints
    ]);
}]);
Route::post('/adminright/changestatus', 'AdminRightController@changeStatus');