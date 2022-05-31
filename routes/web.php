<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\PostController;
use App\Postcard;
use App\PostcardSendingService;
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

Route::get('/', function () {
    // return view('welcome');
    return redirect('/posts');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

Route::get('/pay', [PayOrderController::class, 'store']);

Route::get('/channels', [ChannelController::class, 'index']);

// Typical way
Route::get('/postcards', function () {
    $postcardService = new PostcardSendingService('US', 4, 6);

    $postcardService->hello('Hello from Tehran', 'test@test.com');
});
// Facade way
Route::get('/facades', function () {
    Postcard::hello('Hello from facade', 'abc@123.com');
});
