<?php

namespace App\Http\Controllers;

use App\Contracts\BookInterface;
use App\Models\Book;
use App\Models\Owner;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private BookInterface $bookInterface;
    public function __construct(BookInterface $bookInterface)
    {
        $this->bookInterface = $bookInterface;
    }

    public function index()
    {
        return view("book.show",[
            "books" => Book::with("owner","publisher")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("book.create",[
            "owners" => Owner::all(),
            "publishers" => Publisher::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store()
    {
        $formData =  request()->validate([
            "co_id"=>["required",Rule::exists("content_owner","idx")],
            "publisher_id"=>["required",Rule::exists("publisher","idx")],
            "book_uniq_idx"=>["required",Rule::unique("tbl_book","book_uniq_idx")],
            "bookname"=>["required"],
            "cover_photo"=>["required"],
            "prize"=>["required","numeric"]
        ]);
        $path = request()->file("cover_photo")->store("cover_photo");
        $formData["cover_photo"]=$path;
        $book = $this->bookInterface->store("Book",$formData);
         return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view("book.edit",[
            "book" => $book,
            "owners" => Owner::all(),
            "publishers" => Publisher::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Book $book)
    {
        $formData =  request()->validate([
            "co_id"=>["required",Rule::exists("content_owner","idx")],
            "publisher_id"=>["required",Rule::exists("publisher","idx")],
            "book_uniq_idx"=>["required",Rule::unique("tbl_book","book_uniq_idx")],
            "bookname"=>["required"],
            "prize"=>["required","numeric"]
        ]);

        $formData["cover_photo"]= request()->file('cover_photo') ?
        request()->file("cover_photo")->store("cover_photo") : $book->cover_photo;
        $book = $this->bookInterface->update("Book",$formData,$book->idx);
        return redirect(route('book.index'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->bookInterface->delete("Book",$book->idx);
        return back();
    }
}
