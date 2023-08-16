<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function show(Book $book)
    {
        return view("components.bookShow", compact("book"));
    }
}
