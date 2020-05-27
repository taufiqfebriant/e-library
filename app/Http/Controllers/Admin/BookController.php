<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\DataTables\Admin\BooksDataTable;
use Illuminate\Support\Arr;
use App\Book;
use App\Author;
use App\Category;
use App\Publisher;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BooksDataTable $dataTable)
    {
        return $dataTable->render('admin.book.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('admin.book.create', compact('book', 'authors', 'categories', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Requests\BookRequest
     */
    public function store(BookRequest $request)
    {
        $book = Book::create(Arr::except($request->validated(), 'author_id'));
        $this->storeFiles($book);
        $book->authors()->sync($request->author_id);
        return redirect()->route('admin.books.show', compact('book'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('admin.book.edit', compact('book', 'authors', 'categories', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        if ($request->hasFile('cover')) {
            Storage::disk('public')->delete($book->cover);
        }
        if ($request->hasFile('file')) {
            Storage::delete($book->file);
        }
        $book->update(Arr::except($request->validated(), 'author_id'));
        $this->storeFiles($book);
        $book->authors()->sync($request->author_id);
        return redirect()->route('admin.books.show', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->authors()->sync([]);
        $book->delete();
        return redirect()->route('admin.books.index');
    }
    
    private function storeFiles($book)
    {
        if (request()->hasFile('cover')) {
            $book->update(['cover' => request()->cover->store('uploads/book/covers', 'public')]);
        }
        
        if (request()->hasFile('file')) {
            $book->update(['file' => request()->file->store('uploads/book/files/pdfs')]);
        }
    }
}
