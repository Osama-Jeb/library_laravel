<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
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

//~ HOME PAGE
Route::get("/", [HomeController::class, "index"])->name("home.index");

//~ Home Show Page
Route::get("/show/{book}", [HomeController::class, "show"])->name("home.show");

//- BOOKS ADMIN PAGE
Route::get("/books", [BookController::class, "index"])->name("books.index");


//- BOOKS ADD Function
Route::post("/books/store", [BookController::class, "store"])->name("books.store");

//- BOOKS Update Function
Route::post("/books/update/{book}", [BookController::class, "update"])->name("books.update");

//- BOOKS DELELTE Function
Route::delete("/books/delete/{book}", [BookController::class, "destroy"])->name("books.delete");

//- BOOKS Download Cover Function
Route::get("/books/download/{book}", [BookController::class, "download"])->name("book.download");

//^^ Basket Page
Route::get("/basket", [BasketController::class, "index"])->name("basket.index");

//^^ Basket Add to 
Route::put("/basket/add/{basket}", [BasketController::class, "addToBasket"])->name("basket.add");

//^^ Basket Remove
Route::delete("/basket/remove/{basket}", [BasketController::class, "remove"])->name("basket.remove");

//^^ Basket Delete from basket
Route::delete("/basket/delete/{basket}", [BasketController::class, "destroy"])->name("basket.delete");

//* About Page
Route::get("/about", [AboutController::class, "index"])->name("about.index");

//* About Add to basket
Route::put("/about/add/{book}", [AboutController::class, "addToBasket"])->name("about.add");

//* About Remove One 
Route::delete("/about/remove/{book}", [AboutController::class, "removeOne"])->name("about.remove");
