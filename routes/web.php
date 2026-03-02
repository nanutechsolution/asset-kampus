<?php

use App\Livewire\AssetCreate;
use App\Livewire\AssetHistory;
use App\Livewire\AssetIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/assets/create', AssetCreate::class)->name('assets.create');
Route::get('/assets', AssetIndex::class)->name('assets.index');
Route::get('/assets/{asset}/history', AssetHistory::class)->name('assets.history');