<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[IndexController::class,'index'])->middleware('auth');

Route::get('/show',[IndexController::class, 'show'])->middleware('auth');


Route::resource('listing', ListingController::class)->only(['index', 'show']);

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('user-account',[UserAccountController::class, 'create'])->name('register');
Route::post('user-account/create',[UserAccountController::class, 'store']);

Route::prefix('dashboard')
   ->name('dashboard.')
   ->middleware('auth')
  ->group(function () {
    Route::resource('listing', RealtorListingController::class);
  Route::resource('listing.image', RealtorListingImageController::class)->only(['create', 'store', 'destroy']);

  });




  Route::post('/listing/{listing}/like',[LikeController::class, 'toggle']);
  Route::delete('/listing/{listing}/like',[LikeController::class , 'checkLikes']);

  Route::resource('listing/{listing}/favorite', FavoriteController::class)->only('index');
  

  Route::get('getcomment', [CommentController::class, 'index']);
  Route::post('/comment/store/', [CommentController::class, 'store']);