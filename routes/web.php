<?php


use App\Http\Controllers\CsvMaker;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScriptStarter;
use App\Http\Controllers\DirectoryViewerController;

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
});

Route::get('/run',[ScriptStarter::class,'index']);
Route::get('/dir',[DirectoryViewerController::class,'index']);
//Route::get('/dir', function () {
//    return view('catalog', ['name' => 'James']);
//});
Route::get('/csv',[CsvMaker::class,'index']);
