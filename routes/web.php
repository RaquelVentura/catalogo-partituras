<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartituraController;

Route::get('/partituras', [PartituraController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
