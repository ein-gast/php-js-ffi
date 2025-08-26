<?php

use Illuminate\Support\Facades\Route;
use App\Http\Requests\FfiRequest;
use Illuminate\Http\Request;

Route::get('/', function (Request $req) {
    return view('form', [...$req->old()]);
});

Route::post('/', function (FfiRequest $req) {
    return view('happy', $req->validated());
});
