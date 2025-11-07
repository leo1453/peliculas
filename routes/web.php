<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\adminController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [adminController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
    Route::get('sucursales', [adminController::class, 'index'])->name('sucursales.index');
    Route::post('sucursales/save', [adminController::class, 'save'])->name('sucursales.save');
    Route::post('sucursales/delete/{id}', [adminController::class, 'delete'])->name('sucursales.delete');
    Route::get('sucursales/show/{id}', [adminController::class, 'show'])->name('sucursales.show');

    Route::get('salas', [adminController::class, 'salasIndex'])->name('salas.index');
    Route::post('salas/save', [adminController::class, 'salasSave'])->name('salas.save');
    Route::post('salas/delete/{id}', [adminController::class, 'salasDelete'])->name('salas.delete');
    Route::get('salas/show/{id}', [adminController::class, 'salasShow'])->name('salas.show');

    Route::get('peliculas', [adminController::class, 'peliculasIndex'])->name('peliculas.index');
    Route::post('peliculas/save', [adminController::class, 'peliculasSave'])->name('peliculas.save');
    Route::post('peliculas/delete/{id}', [adminController::class, 'peliculasDelete'])->name('peliculas.delete');
    Route::get('peliculas/show/{id}', [adminController::class, 'peliculasShow'])->name('peliculas.show');

    Route::get('funciones', [adminController::class, 'funcionesIndex'])->name('funciones.index');
    Route::post('funciones/save', [adminController::class, 'funcionesSave'])->name('funciones.save');
    Route::post('funciones/delete/{id}', [adminController::class, 'funcionesDelete'])->name('funciones.delete');
    Route::get('funciones/show/{id}', [adminController::class, 'funcionesShow'])->name('funciones.show');

    Route::post('generar-pdf', [adminController::class, 'generarReportePeliculasSalas'])->name('generar.pdf');

    Route::post('/importar-peliculas', [adminController::class, 'import'])->name('peliculas.import');


});

require __DIR__.'/auth.php';
