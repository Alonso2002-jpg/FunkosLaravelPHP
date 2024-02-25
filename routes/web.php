<?php
use App\Http\Controllers\FunkosController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return redirect()->route('funkos.index');
});

Route::group(['prefix' => 'funkos'], function () {
    Route::get('/', [FunkosController::class, 'index'])->name('funkos.index');
    Route::get('/gestion', [FunkosController::class, 'gestion'])->name('funkos.gestion')->middleware(['auth','role.admin']);
    Route::get('/{funko}', [FunkosController::class, 'show'])->name('funkos.show');
    Route::get('/{category}/category', [FunkosController::class, 'funkosByCate'])->name('funkos.category');
    Route::get('/create/funko', [FunkosController::class, 'create'])->name('funkos.create')->middleware(['auth','role.admin']);
    Route::post('/', [FunkosController::class, 'store'])->name('funkos.store')->middleware(['auth','role.admin']);
    Route::get('/{funko}/edit', [FunkosController::class, 'edit'])->name('funkos.edit')->middleware(['auth','role.admin']);
    Route::put('/{funko}', [FunkosController::class, 'update'])->name('funkos.update')->middleware(['auth','role.admin']);
    Route::delete('/{funko}', [FunkosController::class, 'destroy'])->name('funkos.destroy')->middleware(['auth','role.admin']);
    Route::get('/{funko}/edit-image', [FunkosController::class, 'goUpdImg'])->name('funkos.edit-image')->middleware(['auth','role.admin']);
    Route::patch('/{funko}/update-image', [FunkosController::class, 'updImg'])->name('funkos.update-image')->middleware(['auth','role.admin']);
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/gestion', [CategoryController::class, 'index'])->name('categories.gestion')->middleware(['auth','role.admin']);
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create')->middleware(['auth','role.admin']);
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store')->middleware(['auth','role.admin']);
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware(['auth','role.admin']);
    Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update')->middleware(['auth','role.admin']);
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware(['auth','role.admin']);
    Route::delete('/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore')->middleware(['auth','role.admin']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
