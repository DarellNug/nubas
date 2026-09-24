<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ResortController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Grand Bogor Resort & Botanical Sanctuary Web Routes (GrandBogor.pdf)
|--------------------------------------------------------------------------
*/

// Halaman 1: Beranda (Resort Landing Page)
Route::get('/', [ResortController::class, 'beranda'])->name('home');

// Halaman 2: Tentang Kami (Suaka Botanikal Parahyangan)
Route::get('/tentang-kami', [ResortController::class, 'tentangKami'])->name('tentang-kami');

// Halaman 3: Galeri Resor & Visual Sanctuary
Route::get('/galeri', [ResortController::class, 'galeri'])->name('galeri');

// Halaman 4: Tim Manajemen (Dewan Kepemimpinan & Eksekutif)
Route::get('/tim-manajemen', [ResortController::class, 'timManajemen'])->name('tim-manajemen');

// Halaman 5: Kontak & Lokasi / Reservasi Kamar
Route::get('/kontak', [ResortController::class, 'kontak'])->name('kontak');
Route::post('/reservasi', [ResortController::class, 'storeReservasi'])->name('reservasi.store');

// Jurnal & Berita Resor (Secondary Blog)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
