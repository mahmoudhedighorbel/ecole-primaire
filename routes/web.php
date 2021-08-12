<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ensController;
use App\Http\Controllers\Backend\MatiereController;
use App\Http\controllers\AffEnsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});


Route::get('/emploi', function () {
    return view('backend.view_emploi');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// user managment

Route::prefix('admin')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('admin.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('admins.add');
    Route::post('/store', [UserController::class, 'AdminStore'])->name('admins.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('admin.edit');
    Route::post('/miseajour/{id}', [UserController::class, 'AdminUpdate'])->name('admin.miseajour');
    Route::get('/effacer/{id}', [UserController::class, 'AdminDelete'])->name('admin.delete');

});

Route::prefix('maitre')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('maitre.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('maitres.add');
    Route::post('/store', [UserController::class, 'MaitreStore'])->name('maitres.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('maitre.edit');
    Route::post('/miseajour/{id}', [UserController::class, 'MaitreUpdate'])->name('maitre.miseajour');
    Route::get('/effacer/{id}', [UserController::class, 'MaitreDelete'])->name('maitre.delete');

});

Route::prefix('eleve')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('eleve.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('eleves.add');
    Route::post('/store', [UserController::class, 'EleveStore'])->name('eleves.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('eleve.edit');
    Route::post('/miseajour/{id}', [UserController::class, 'EleveUpdate'])->name('eleve.miseajour');
    Route::get('/effacer/{id}', [UserController::class, 'EleveDelete'])->name('eleve.delete');

});



Route::prefix('Enseignant')->group(function(){

    Route::get('/view', [App\Http\controllers\ensgController::class, 'EnsView'])->name('Ens.view');
    Route::get('/add', [App\Http\controllers\ensgController::class, 'EnsAdd'])->name('Ens.add');
    Route::post('/store', [App\Http\controllers\ensgController::class, 'EnsStore'])->name('Ens.store');
    Route::post('/miseajour/{id}', [App\Http\controllers\ensgController::class, 'EnsUpdate'])->name('Ens.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\ensgController::class, 'EnsDelete'])->name('Ens.delete');

});


Route::prefix('Classe')->group(function(){

    Route::get('/view', [App\Http\controllers\ClasseController::class, 'ClasseView'])->name('classe.view');

    Route::post('/store', [App\Http\controllers\ClasseController::class, 'ClasseStore'])->name('classe.store');
    Route::post('/miseajour/{id}', [App\Http\controllers\ClasseController::class, 'ClasseUpdate'])->name('classe.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\ClasseController::class, 'ClasseDelete'])->name('classe.delete');

});

Route::prefix('Matiere')->group(function(){

    Route::get('/view', [App\Http\controllers\MatiereController::class, 'MatiereView'])->name('matiere.view');

    Route::post('/store', [App\Http\controllers\MatiereController::class, 'MatiereStore'])->name('matiere.store');
    Route::post('/miseajour/{id}', [App\Http\controllers\MatiereController::class, 'MatiereUpdate'])->name('matiere.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\MatiereController::class, 'MatiereDelete'])->name('matiere.delete');

});


/* Route::prefix('AffectationEns')->group(function(){

    Route::get('/view', [App\Http\controllers\AffEnsController::class, 'AffEnsView'])->name('affens.view');

    Route::post('/store', [App\Http\controllers\AffEnsController::class, 'AffEnsStore'])->name('affens.store');
    Route::post('/miseajour/{id}', [App\Http\controllers\AffEnsController::class, 'AffEnsUpdate'])->name('affens.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\AffEnsController::class, 'AffEnsDelete'])->name('affens.delete');

});
 */
/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/index');
})->name('dashboard'); */
