<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view("backend.pages.books", compact("books"));
    }

    public function store(Request $request)
    {
        request()->validate([
            "title" => ["required"],
            "author" => ["required"],
            "summary" => ["required"],
            "img" => "required|image|mimes:png,jpg,jpeg|max:2048",
            "price" => ["required", "integer"],
            "stock" => ["required", "integer"],
        ]);

        $request->file("img")->storePublicly('images/', 'public');


        Book::create([
            "title" => $request->title,
            "author" => $request->author,
            "summary" => $request->summary,
            "img" =>  $request->file("img")->hashName(),
            "price" => $request->price,
            "stock" => $request->stock,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Book $book)
    {
        request()->validate([
            "title" => ["required"],
            "author" => ["required"],
            "summary" => ["required"],
            "img" => "image|mimes:png,jpg,jpeg|max:2048",
            "price" => ["required", "integer"],
            "stock" => ["required", "integer"],
        ]);

        // $path = "storage\images\\" . $book->img;
        // if (file_exists($path)) {
        //     unlink($path);
        // }

        // $fileName = time() . '.' . $request->img->extension();
        // $request->img->storeAs('public/images', $fileName);

        // $book->update([
        //     "title" => $request->title,
        //     "author" => $request->author,
        //     "summary" => $request->summary,
        //     "img" => $fileName,
        //     "price" => $request->price,
        //     "stock" => $request->stock,
        // ]);

        if ($request->file("img") !== null) {
            // delete from storage
            Storage::disk("public")->delete("images/", $book->img);

            // update image
            $request->file("img")->storePublicly("images/", "public");

            $book->update([
                "title" => $request->title,
                "author" => $request->author,
                "summary" => $request->summary,
                "img" => $request->file("img")->hashName(),
                "price" => $request->price,
                "stock" => $request->stock,
            ]);
        } else {
            $book->update([
                "title" => $request->title,
                "author" => $request->author,
                "summary" => $request->summary,
                "price" => $request->price,
                "stock" => $request->stock,
            ]);
        }

        return redirect()->back();
    }


    public function destroy(Book $book)
    {
        // DELETE Item from basket if it exists
        $existBasket = Book::where("title", $book->title)->first();
        if ($existBasket) {
            $existBasket->delete();
        }

        // $path = "storage/images/" . $book->img;
        // if (file_exists($path)) {
        //     unlink($path);
        //     $book->delete();
        // }

        Storage::disk("public")->delete("images/", $book->img);

        return redirect()->back();
    }

    public function download(Book $book)
    {
        // $path = "storage/images//" . $book->img;
        // if (file_exists($path)) {
        //     return response()->download($path);
        // }

        return Storage::disk("public")->download("images/" . $book->img, $book->img);
    }
}
