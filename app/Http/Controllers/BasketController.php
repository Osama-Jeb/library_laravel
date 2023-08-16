<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Book;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $baskets = Basket::all();
        return view("frontend.pages.basket", compact("baskets"));
    }

    public function addToBasket(Basket $basket)
    {
        $bookExists = Book::where("title", $basket->title)->first();
        if ($bookExists) {
            if ($bookExists->stock > 0) {
                $bookExists->stock -= 1;
                $basket->number += 1;
                $bookExists->save();
                $basket->save();
            }
        }
        return redirect()->back();
    }

    public function remove(Basket $basket)
    {
        $bookExists = Book::where("title", $basket->title)->first();
        if ($basket->number === 1) {
            $basket->delete();
        } else {
            $basket->number -= 1;
            $basket->save();
        }
        $bookExists->stock += 1;
        $bookExists->save();

        return redirect()->back();
    }

    public function destroy(Basket $basket)
    {
        $bookExists = Book::where("title", $basket->title)->first();
        $bookExists->stock += $basket->number;
        $bookExists->save();
        $basket->delete();
        return redirect()->back();
    }
}
