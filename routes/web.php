<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\indexPropertyController;
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

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';


Route::get('/', [HomeController::class, 'index']);
Route::get('/biens', [indexPropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [indexPropertyController::class, 'show'])->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex
]);

Route::prefix('admin')->name('admin.')->group(function () {
    // resource() : creer toutes les routes CRUD
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
