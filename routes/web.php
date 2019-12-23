<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UploadVideoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VoteController;

Route::group(['prefix' => 'back'],function(){
    Route::get('/', 'Admin\DashboardController@index');
});

Route::resource('/channels', 'ChannelController');
Route::get('videos/{video}/delete', [VideoController::class, 'destroy']);
Route::get('videos/{video}', [VideoController::class, 'show'])->name('videos.show');
Route::put('videos/{video}', [VideoController::class, 'updateViews']);
Route::get('videos/{video}/comments', [CommentController::class, 'index']);
Route::get('comments/{comment}/replies', [CommentController::class, 'show']);
Route::put('videos/{video}/update', [VideoController::class, 'update'])->middleware(['auth'])->name('videos.update');



Route::middleware(['auth'])->group(function () {
    Route::post('comments/{video}', [CommentController::class, 'store']);
    Route::post('votes/{entityId}/{type}', [VoteController::class, 'vote']);
    Route::resource('channels/{channel}/subscriptions', 'SubscriptionController')->only(['store', 'destroy']);
    Route::get('channels/{channel}/videos', [UploadVideoController::class, 'index'])->name('channel.upload');
    Route::post('channels/{channel}/videos', [UploadVideoController::class, 'store']);
});

Route::get('/', 'HomePageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
