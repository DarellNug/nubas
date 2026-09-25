<?php

use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HotelController::class, 'index'])->name('home');
Route::get('/post/{post}', [HotelController::class, 'show'])->name('post.show');
