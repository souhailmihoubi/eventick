<?php


use Admin\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

//Route::get('/', function () {return view('welcome');});

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index']);
    
    //Category
    Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'add']);
    Route::post('insert-category', [App\Http\Controllers\Admin\CategoryController::class, 'insert']);
    Route::get('edit-cat/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('delete-cat/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    
    //Goverment
    Route::get('government', [App\Http\Controllers\Admin\GovernmentController::class, 'index']);
    Route::get('add-government', [App\Http\Controllers\Admin\GovernmentController::class, 'add']);
    Route::post('insert-government', [App\Http\Controllers\Admin\GovernmentController::class, 'insert']);
    Route::get('edit-government/{id}', [App\Http\Controllers\Admin\GovernmentController::class, 'edit']);
    Route::put('update-government/{id}', [App\Http\Controllers\Admin\GovernmentController::class, 'update']);
    Route::get('delete-government/{id}', [App\Http\Controllers\Admin\GovernmentController::class, 'destroy']);


    //Place
    Route::get('places', [App\Http\Controllers\Admin\PlacesController::class, 'index']);
    Route::post('insert-places', [App\Http\Controllers\Admin\PlacesController::class, 'insert']);
    Route::get('add-places', [App\Http\Controllers\Admin\PlacesController::class, 'add']);
    Route::get('edit-places/{id}', [App\Http\Controllers\Admin\PlacesController::class, 'edit']);
    Route::put('update-places/{id}', [App\Http\Controllers\Admin\PlacesController::class, 'update']);
    Route::get('delete-places/{id}', [App\Http\Controllers\Admin\PlacesController::class, 'delete']);
    Route::get('/searchgov', [App\Http\Controllers\Admin\PlacesController::class, 'search']);

    //Ticket
    Route::get('tickets', [App\Http\Controllers\Admin\TicketController::class, 'index']);
    Route::get('add-ticket', [App\Http\Controllers\Admin\TicketController::class, 'add']);
    Route::post('insert-ticket', [App\Http\Controllers\Admin\TicketController::class, 'insert']);
    Route::get('edit-ticket/{id}', [App\Http\Controllers\Admin\TicketController::class, 'edit']);
    Route::get('view-ticket/{id}', [App\Http\Controllers\Admin\TicketController::class, 'view']);
    Route::put('update-ticket/{id}', [App\Http\Controllers\Admin\TicketController::class, 'update']);
    Route::get('delete-ticket/{id}', [App\Http\Controllers\Admin\TicketController::class, 'delete']);

    //Event Dates
    Route::get('type/{id}', [App\Http\Controllers\Admin\TypeController::class, 'index']);
    Route::post('insert-type/{id}', [App\Http\Controllers\Admin\TypeController::class, 'insert']);
    Route::post('done', [App\Http\Controllers\Admin\TypeListController::class, 'insert']);
    Route::get('detail-ticket/{id}', [App\Http\Controllers\Admin\TicketController::class, 'detail']);

    Route::get('typelist/{id}', [App\Http\Controllers\Admin\TypeListController::class, 'index']);
    Route::get('typelist/{idt}/place/{id}', [App\Http\Controllers\Admin\TypeListController::class, 'show']);
    Route::post('insert/ticket/{idt}/place/{id}', [App\Http\Controllers\Admin\TypeListController::class, 'insert']);
    Route::get('insert/ticket/{idt}/place/{id}/datetime', [App\Http\Controllers\Admin\EventDatesController::class, 'add']);
    Route::post('insert/ticket/{idt}/place/{id}/datetime/add', [App\Http\Controllers\Admin\EventDatesController::class, 'insert']);

});
