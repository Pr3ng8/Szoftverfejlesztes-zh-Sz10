<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $json = json_decode(Storage::get("bestsellers_with_categories.json"),true);

        foreach ($json as $book)
        {

            $author = new Author(['name' => $book['Author']]);
            $author->save();

            $genre = new Genre(['name' => $book['Genre']]);
            $genre->save();

            $new_book = New Book(['name' => $book['Name'], 'user_rating' => $book['User Rating'], 'reviews' => $book['Reviews'], 'price'=>$book['Price'], 'year'=>$book['Year'], 'author_id' => $author->id, 'genre_id' => $genre->id]);
            $new_book->save();
        }

        $books = Book::paginate(15);

        $prices = Book::all(['price'])->map(function ($item){
            return $item->price;
        })->toArray();

        $names = Book::all(['id'])->map(function ($item){
            return $item->id;
        })->toArray();

        return view('welcome',['books' => $books, 'prices' => $prices, 'names' => $names]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
