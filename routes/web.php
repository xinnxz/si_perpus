<?php

use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Route::get('/role', function () {
    //     return view('welcome');
    // })->middleware(['role:mahasiswa']);
    Route::view('/roles', 'role')->name('role')->middleware(['role:mahasiswa']);
    // Route::view('/books', 'book')->name('book')->middleware(['role: admin']);
    Route::group(
        [
            'middleware' => ['role:admin'],
            'prefix' => 'bookshelf',
            'as' => 'bookshelf.'
        ],
        function () {
            Route::get('/', [BookshelfController::class, 'index'])->name('index');
            Route::get('/create', [BookshelfController::class, 'create'])->name('create');
            Route::post('/', [BookshelfController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BookshelfController::class, 'edit'])->name('edit');
            Route::put('/{id}', [BookshelfController::class, 'update'])->name('update');
            Route::delete('/{id}', [BookshelfController::class, 'destroy'])->name('destroy');
            Route::get('/print', [BookshelfController::class, 'print'])->name('print');
            Route::get('/export', [BookshelfController::class, 'export'])->name('export');
            Route::get('/import', [BookshelfController::class, 'import'])->name('import');
            
        }
    );

    Route::group(
        [
            'middleware' => ['role:admin'],
            'prefix' => 'category',
            'as' => 'category.'
        ],
        function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
            Route::get('/print', [CategoryController::class, 'print'])->name('print');
            Route::get('/export', [CategoryController::class, 'export'])->name('export');
            Route::get('/import', [CategoryController::class, 'import'])->name('import');
        }
    );

    Route::group(
        [
            'middleware' => ['role:admin'],
            'prefix' => 'book',
            'as' => 'book.'
        ],
        function () {
            Route::get('/', [BookController::class, 'index'])->name('index');
            Route::get('/create', [BookController::class, 'create'])->name('create');
            Route::post('/', [BookController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit');
            Route::put('/{id}', [BookController::class, 'update'])->name('update');
            Route::delete('/{id}', [BookController::class, 'destroy'])->name('destroy');
            Route::get('/print', [BookController::class, 'print'])->name('print');
            Route::get('/export', [BookController::class, 'export'])->name('export');
            Route::get('/import', [BookController::class, 'import'])->name('import');
        }
        
    );
    

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
