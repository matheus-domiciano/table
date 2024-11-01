<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Book::paginate(10);

        return view('books', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
    

        // Varifica se o campo de pesquisa está vazio
        if (empty($request->name)) {
            $books = Book::all(); // Caso o valor seja vazio, retornará todos os livros disponíveis
        } else {
            // Busca por título utilizando ILIKE para busca parcial no postgr
            $books = Book::where('title', 'ILIKE', "%{$request->name}%")->get();
        }

        // Retorna a resultados em JSON
        return response()->json([
            'message' => 'Search results',
            'books' => $books
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'b_height' => 'required|integer',
        ]);

        // Criação do novo registro
        $book = Book::create($validatedData);

        // Retorna um JSON com o novo registro
        return response()->json([
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'b_height' => 'required|integer',
        ]);

        // Localiza o registro e executa a atualização
        $book = Book::findOrFail($id);

        $book->update($request->only(['title', 'author', 'genre', 'b_height']));

        // Retorna uma resposta JSON após a atualização
        return response()->json([
            'message' => 'Book updated successfully',
            'data' => $book
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $book = Book::findOrFail($request->id); // Encontra o livro ou lança um erro 404 se não for encontrado
        $book->delete(); // Remove o livro

        // Retorn status 200 caso 
        return response()->json([
            'message' => 'Success to remoove!',
            'status' => 200
        ]);;
    }
}
