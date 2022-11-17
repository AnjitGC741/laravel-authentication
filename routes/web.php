<?php
use App\Http\Controllers\NewauthenticationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[NewAuthenticationController::class,'index']);
Route::get('/sign-in', function()
{
    return view('signIn');
});
Route::get('/loginPage',function()
{
    return view('loginPage');
});
Route::post('/sign-in',[NewAuthenticationController::class,'saveList'])->name('saveList');
Route::post('/loginPage',[NewAuthenticationController::class,'loginUser'])->name('loginUser');