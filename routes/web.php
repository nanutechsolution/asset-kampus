<?php

use App\Livewire\AssetCreate;
use App\Livewire\AssetIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/assets/create', AssetCreate::class)->name('assets.create');
Route::get('/assets', AssetIndex::class)->name('assets.index');