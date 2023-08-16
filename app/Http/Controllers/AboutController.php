<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Book;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view("frontend.pages.about", compact("books"));
    }

    public function addToBasket(Book $book)
    {
        $basketExists = Basket::where("title", $book->title)->first();
        if ($basketExists) {
            $basketExists->number += 1;
            $basketExists->save();
        } else {
            Basket::create([
                "title" => $book->title,
                "number" => 1,
                "price" => $book->price,
            ]);
        }
        $book->stock -= 1;
        $book->save();

        return redirect()->back();
    }

    public function removeOne(Book $book)
    {
        $basketExists = Basket::where("title", $book->title)->first();
        if ($basketExists) {
            $basketExists->number -= 1;
            if ($basketExists->number === 0) {
                $basketExists->delete();
            } else {
                $basketExists->save();
            }
            $book->stock += 1;
            $book->save();
        }
        return redirect()->back();
    }
}
