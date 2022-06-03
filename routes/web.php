<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ContestEntryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Postcard;
use App\PostcardSendingService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;

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

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

// Service Container
Route::get('/pay', [PayOrderController::class, 'store']);

// View Composers
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

// Macro
Route::get('/macro', function () {
    dd(Str::partNumber('1234561515'));
    dd(Str::prefix('97513164979', 'ABCD-'));

    return Response::errorJson('A huge error occured! BOOM!');
});

// Repository pattern
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customer/{id}', [CustomerController::class, 'show']);
Route::get('/customer/{id}/update', [CustomerController::class, 'update']);
Route::get('/customer/{id}/delete', [CustomerController::class, 'destroy']);

// lazy load
Route::get('/lazy', function () {
    // Memory exhausted
    // $collection = Collection::times(10000000)
    //     ->map(function ($number) {
    //         return pow(2, $number);
    //     })
    //     ->all();

    $collection = LazyCollection::times(100000000000000);

    // return User::cursor();

    return 'done!';
});

Route::get('generator', function () {
    function notHappyFunction($number)
    {
        $return = [];

        for ($i = 1; $i < $number; $i++) {
            $return[] = $i;
        }

        return $return;
    }

    function happyFunction($number)
    {
        for ($i = 1; $i < $number; $i++) {
            yield $i;
        }
    }

    foreach (happyFunction(10000000) as $number) {
        if ($number % 1000 == 0) {
            dump('hello');
        }
    }

    // function happyFunction($strings)
    // {
    //     foreach ($strings as $string) {
    //         dump('start');
    //         yield $string;
    //         dump('end');
    //     }
    // }

    // foreach (happyFunction(['One', 'Two', 'Three']) as $result) {
    //     if ($result == 'Two') {
    //         return;
    //     }
    //     dump($result);
    // }
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/contest', [ContestEntryController::class, 'store']);
