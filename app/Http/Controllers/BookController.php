<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            "imgFile" => "image|mimes:png,jpg,jpeg|max:2048",
            // "imgUrl" => ["required"],
            "price" => ["required", "integer"],
            "stock" => ["required", "integer"],
        ]);

        if (($request->file("imgFile") === null && $request->imgUrl === null) || ($request->file("imgFile") && $request->imgUrl)) {
            // return with an error flash message

            return back()->with("error", "Only one of the image source my be filled!!");

        } else if ($request->file("imgFile") !== null) {
            $request->file("imgFile")->storePublicly('images/', 'public');
            Book::create([
                "title" => $request->title,
                "author" => $request->author,
                "summary" => $request->summary,
                "imgFile" =>  $request->file("imgFile")->hashName(),
                "imgUrl" => Str::random(40),
                "price" => $request->price,
                "stock" => $request->stock,
            ]);
        } else {

            // get the image from the link using the filegetcontents function
            $token = Str::random(20);
            $imageContent = file_get_contents($request->imgUrl);
            Storage::put('public/images/' . $token . basename($request->imgUrl), $imageContent);

            Book::create([
                "title" => $request->title,
                "author" => $request->author,
                "summary" => $request->summary,
                "imgFile" => $token . basename($request->imgUrl),
                "imgUrl" => $token . basename($request->imgUrl),
                "price" => $request->price,
                "stock" => $request->stock,
            ]);
        }



        return redirect()->back()->with("success", "Book Successfully Added.");
    }

    public function update(Request $request, Book $book)
    {
        request()->validate([
            "title" => ["required"],
            "author" => ["required"],
            "summary" => ["required"],
            "imgFile" => "image|mimes:png,jpg,jpeg|max:2048",
            "price" => ["required", "integer"],
            "stock" => ["required", "integer"],
        ]);

        if ($request->file("imgFile") !== null) {
            // delete from storage
            Storage::disk("public")->delete("images/", $book->imgFile);

            // update image
            $request->file("imgFile")->storePublicly("images/", "public");

            $book->update([
                "title" => $request->title,
                "author" => $request->author,
                "summary" => $request->summary,
                "imgFile" => $request->file("imgFile")->hashName(),
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

        Storage::disk("public")->delete("images/" . $book->imgFile);

        return redirect()->back();
    }

    public function download(Book $book)
    {
        $path = "storage/images//" . $book->imgFile;
        if (file_exists($path)) {
            return response()->download($path);
        }
    }
}
