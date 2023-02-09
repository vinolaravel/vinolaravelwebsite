<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CellierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\AdminCellierController;
use App\Http\Controllers\BouteilleSaqController;
use App\Http\Controllers\AdminBouteilleController;
use App\Http\Controllers\ChercheBouteilleController;
use Illuminate\Support\Facades\Session;

// check if session exists, if not, redirect to welcome page, else redirect to celliers page
// Route::get('/', [CellierController::class, 'redirection'])->name('redirection');


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/celliers');
    });
    Route::get('/celliers', [CellierController::class, 'index'])->name('celliers');
    Route::post('/celliers', [CellierController::class, 'store'])->name('celliers.store');
    Route::get('/celliers/ajouter', [CellierController::class, 'create'])->name('celliers.create');
    Route::get('/celliers/{id}/edit', [CellierController::class, 'edit'])->name('celliers.edit');
    Route::put('/celliers/{id}', [CellierController::class, 'update'])->name('celliers.update');
    Route::delete('/celliers/{id}', [CellierController::class, 'destroy'])->name('celliers.destroy');
    Route::get('/celliers/{id}/bouteilles', [CellierController::class, 'show'])->name('celliers.show');
    Route::get('/celliers/{id}/bouteilles/{idBouteille}/edit', [BouteilleController::class, 'edit'])->name('bouteilles.edit');
    Route::put('/celliers/{id}/bouteilles/{idBouteille}/update', [BouteilleController::class, 'update'])->name('bouteilles.update');
    Route::delete('/celliers/{id}/bouteilles/{idBouteille}', [BouteilleController::class, 'destroy'])->name('bouteilles.remove');
    Route::get('/celliers/{id}/bouteilles/createBouteille', [BouteilleController::class, 'create'])->name('bouteilles.create');
    Route::post('/celliers/{id}/bouteilles/storeBouteille', [BouteilleController::class, 'store'])->name('bouteilles.store');
    Route::get('/celliers/{id}/bouteilles/{idbouteille}', [CellierController::class, 'detailsBouteille'])->name('celliers.detailsBouteille');
    Route::post('/celliers/{id}/bouteilles/add/{idBouteille}', [BouteilleController::class, 'addBouteille'])->name('bouteilles.add');
    Route::post('/celliers/{id}/bouteilles/drink/{idBouteille}', [BouteilleController::class, 'drinkBouteille'])->name('bouteilles.drink');



    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/celliers', [AdminCellierController::class, 'index'])->name('admin.celliers');
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{idUser}/celliers', [AdminCellierController::class, 'show'])->name('admin.afficheCelliers');
    Route::delete('/admin/users/{idUser}', [AdminUserController::class, 'destroy'])->name('admin.userDelete');
    // Route::get('/admin/users/{idUser}/celliers/{idCellier}/change', [AdminCellierController::class, 'edit'])->name('admin.editCellier');
    // Route::put('/admin/users/{idUser}/celliers/{idCellier}', [AdminCellierController::class, 'update'])->name('admin.updateCellier');
    Route::delete('/admin/users/{idUser}/celliers/{idCellier}', [AdminCellierController::class, 'destroy'])->name('admin.cellierDelete');
    Route::get('/admin/users/{idUser}/celliers/{idCellier}/details', [AdminCellierController::class, 'voirContenu'])->name('admin.voirContenuCellier');



    Route::get('/updateSAQ', [BouteilleSaqController::class, 'updateSAQ'])->name('updateSAQ');



    Route::get('/search', [ChercheBouteilleController::class, 'search'])->name('search');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

if (!Session::has('user')) {
    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest')->name('welcome');
}
