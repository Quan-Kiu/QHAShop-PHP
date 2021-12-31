<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceStatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('product/search/{name}',[ProductController::class,'search']) ;
    Route::post('/register',[AuthController::class,'register']);
});
Route::resource('product',ProductController::class);
Route::post('/logout',[AuthController::class,'logout']);
Route::post('/login',[AuthController::class,'login']);

Route::resource('producttype',ProductTypeController::class);
Route::get('producttype/search/{name}',[ProductTypeController::class,'search']);

Route::resource('cart',CartController::class);

Route::resource('color',ColorController::class);

Route::resource('comment',CommentController::class);

Route::resource('image',ImageController::class);

Route::resource('invoice',InvoiceController::class);

Route::resource('invoice_detail',InvoiceDetailController::class);

Route::resource('size',SizeController::class);

Route::resource('supplier',SupplierController::class);

Route::resource('user_type',UserTypeController::class);

Route::resource('user',UserController::class);

Route::resource('invoice_status',InvoiceStatusController::class);



