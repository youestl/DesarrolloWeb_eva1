<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/registro', [AuthController::class, 'registro'])->name('api.registro');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware(['jwt.verify'])->group(function () {
    Route::get('/perfil', function () {
        return response()->json([
            'status' => 'success',
            'usuario' => auth('api')->user()
        ]);
    });
});
