<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;

class SiteController extends Controller
{
    public function index()
    {
        $livros = Book::paginate(10);

        return view('books', compact('livros'));
    }


    public function search($title){
      //  $book = Book::where("title", $title);
       // return view('search', compact('book'));
    }


}
