<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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

/**
 * Pages Route
 */
Route::get('/', function () {
    return view('pages.welcome');
});
Route::get('/property-list', function () {
    return view('pages.property-list');
});
Route::get('/solds-and-actives', function () {
    return view('pages.solds-and-actives');
});
Route::get('/forms/cash-buyers', function () {
    return view('pages.forms.cash-buyers');
});
Route::get('/forms/private-lenders', function () {
    return view('pages.forms.private-lenders');
});
Route::get('/forms/rental', function () {
    return view('pages.forms.rental');
});

/**
 * Property Routes
 */
Route::get('property/zestimate', [PropertyController::class, 'getZestimate']);
Route::get('property/all', [PropertyController::class, 'all']);
Route::get('property/import', [PropertyController::class, 'import']);
Route::get('property/calculation/{id}', [PropertyController::class, 'propertyCalculation']);
Route::get('property/calculations', [PropertyController::class, 'calculationSummary']);
Route::resource('property', PropertyController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
