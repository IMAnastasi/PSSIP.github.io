<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('z1', function () {
    return view('z1');
});

Route::get('z2', function () {
    return view('z2');
});

Route::get('z2-get', function () {
    return view('z2-get');
})->name('z2-get');

Route::get('z3', function () {
    return view('z3');
});

Route::get('z4', function () {
    return view('z4');
});

Route::get('z5', function () {
    return view('z5');
});

Route::get('z6', function () {
    return view('z6');
});

Route::get('z6-get', [\App\Http\Controllers\ZController::class, 'index'])->name('z6-get');

Route::get('zadanie', function () {
    return view('1');
});

Route::post('zadanie', function (\Illuminate\Http\Request $request) {

    session(['email' => $request->input('email')]);
    session(['phone' => $request->input('phone')]);
    $a = $request->input('first_name');
    $b = $request->input('last_name');
    \Illuminate\Support\Facades\Storage::disk('local')->put('fio.txt', $a . ' ' .  $b);

    return view('2');
})->name('zadanie');

Route::get('store', function () {
    return view('3');
});
Route::post('store', function () {
    \App\Models\Student::query()->create(request()->all());

    dd(\App\Models\Student::query()->toBase()->get());
})->name('store');
