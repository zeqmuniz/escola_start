<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/redirect-dashboard', function () {
    $user = auth()->user();

    if ($user->perfil->nome === 'administrador') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->perfil->nome === 'professor') {
        return redirect()->route('professor.dashboard');
    }

    if ($user->perfil->nome === 'aluno') {
        return redirect()->route('aluno.dashboard');
    }

    return redirect('/');

})->middleware(['auth'])->name('redirect.after.login');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'perfil:administrador'])
                ->prefix('admin')
                ->name('admin.')
                ->group(function(){
    Route::get('/dasboard', [DashboardController::class, 'index'])
                ->name('dashboard');
});

require __DIR__.'/auth.php';
