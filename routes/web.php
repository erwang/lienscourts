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

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Auth::routes();

Route::get('', 'UserController@dashboard')->name('dashboard')->middleware('auth');
Route::post('/link/add','LinkController@store')->name('link.add')->middleware('auth');
Route::delete('/link/destroy/{item}','LinkController@destroy')->name('link.destroy')->middleware('auth');
Route::get('/link/qrcode/{link}', 'LinkController@qrcode')->name('link.qrcode');
Route::get('/link/graph/{link}', 'LinkController@graph')->name('link.graph');
Route::get('{shorturl}',function($shorturl){
    $link = \App\Link::where('shorturl',$shorturl)->first();
    if(null!==$link) {
        $link->count+=1;
        $link->save();
        \App\Log::create(['link_id'=>$link->id]);
        return redirect($link->url);
    }else{
        abort(404);
    }
});
