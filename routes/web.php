<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic as Image;

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
    $games = \App\Models\Games::all();
    $onegame = \App\Models\Games::all()->random();
//    dd($onegames);
    return view('shop.main', ['games' => $games,'onegame'=>$onegame]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('shop/main', function () {
    $games = \App\Models\Games::all();
    $onegame = \App\Models\Games::all()->random();
    return view('shop.main', ['games' => $games,'onegame'=>$onegame]);
})->name('shop.main');

Route::get('shop/news', function () {
    $onegame = \App\Models\Games::all()->random();
    return view('shop.news',['onegame'=>$onegame]);
})->name('shop.news');

Route::get('shop/about', function () {
    $onegame = \App\Models\Games::all()->random();
    return view('shop.about',['onegame'=>$onegame]);
})->name('shop.about');

Route::get('shop/cart1', function (\Illuminate\Http\Request $request) {
    $ret = [];
    if ($request->user()['id'] == session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')) {
        $orders = \App\Models\Orders::query()->select()->where('user_id', '=', $request->user()['id'])->get();
    }
    return view('shop.cart1', ['orders' => $orders]);
})->name('shop.cart1')->middleware('auth');

Route::get('shop/cart2', function () {
    return view('shop.cart2');
})->name('shop.cart2')->middleware('auth');

Route::get('shop/admin', function () {
    return view('shop.admin');
})->name('shop.admin');

Route::get('shop/product/{id}', function (\Illuminate\Http\Request $request) {
    $game = \App\Models\Games::all()->find($request->id);
    $onegame = \App\Models\Games::all()->random();
    return view('shop.product', ['game' => $game,'onegame'=>$onegame]);
})->name('shop.product');

Route::get('shop/picture/{id}', [\App\Http\Controllers\ShopController::class, 'picture'])->name('shop.picture');

Route::get('shop/edit/{game}', [\App\Http\Controllers\ShopController::class, 'edit'])->name('shop.edit')->middleware('auth');
Route::post('/shop/save/{game}', [\App\Http\Controllers\ShopController::class, 'save'])->name('shop.save')->middleware('auth');
Route::get("shop/delete", [\App\Http\Controllers\ShopController::class, 'delete'])->name('shop.delete')->middleware('auth');
Route::get('shop/add', function () {
    return view('shop.add');
})->name('shop.add')->middleware('auth');
Route::post('shop/added', [\App\Http\Controllers\ShopController::class, 'gameAdd'])->name('game.add')->middleware('auth');

Route::get('shop/form/{id}', [\App\Http\Controllers\UserController::class, 'userOrder'])->name('shop.form')->middleware('auth');

Route::post('shop/order', [\App\Http\Controllers\OrdersController::class, 'orders'])->name('shop.order')->middleware('auth');

Route::get('shop/action',function (){

   $games = \App\Models\Games::query()->select()->where('category','=','Action')->get();
    $onegame = \App\Models\Games::all()->random();
    return view('shop.action',['games'=>$games,'onegame'=>$onegame]);
})->name('shop.action');

Route::get('shop/rpg',function (){
    $games = \App\Models\Games::query()->select()->where('category','=','RPG')->get();
    $onegame = \App\Models\Games::all()->random();
    return view('shop.rpg',['games'=>$games,'onegame'=>$onegame]);
})->name('shop.rpg');

Route::get('shop/online',function (){
    $games = \App\Models\Games::query()->select()->where('Category','=','Online')->get();
    $onegame = \App\Models\Games::all()->random();
    return view('shop.online',['games'=>$games,'onegame'=>$onegame]);
})->name('shop.online');

Route::get('shop/strategy',function (){

    $games = \App\Models\Games::query()->select()->where('category','=','Strategy')->get();
    $onegame = \App\Models\Games::all()->random();
    return view('shop.strategy',['games'=>$games,'onegame'=>$onegame]);
})->name('shop.strategy');

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('table-list', [\App\Http\Controllers\ShopController::class, 'getProduct'])->name('table');

    Route::get('typography', function () {
        return view('pages.typography');
    })->name('typography');

    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');

    Route::get('map', function () {
        return view('pages.map');
    })->name('map');

    Route::get('notifications', function () {
        return view('pages.notifications');
    })->name('notifications');

    Route::get('rtl-support', function () {
        return view('pages.language');
    })->name('language');

    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

