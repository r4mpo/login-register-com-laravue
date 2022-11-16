<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('/spa/{any}', function () { return view('welcome'); })->where('any', '.*');