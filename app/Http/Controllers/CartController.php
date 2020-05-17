<?php

namespace App\Http\Controllers;

use App\Book;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = \Cart::session(auth()->user()->id)->getContent();
        return view('cart.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $book = Book::find(request()->id);
        \Cart::session(auth()->user()->id)->add([
            'id' => $book->id,
            'name' => $book->title,
            'price' => 0,
            'quantity' => 1,
            'attributes' => [
                'cover' => $book->cover,
                'authors' => $book->getCommaSeparatedAuthors()
            ],
            'associateModel' => $book
        ]);
        return response()->json(['total' => \Cart::getContent()->count()]);
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
        \Cart::session(auth()->user()->id)->remove($id);
        return back()->with(['type' => 'success', 'message' => 'Berhasil menghapus buku dari keranjang.']);
    }

    public function multipleDestroy()
    {
        \Cart::session(auth()->user()->id)->clear();
        return back()->with(['type' => 'success', 'message' => 'Berhasil menghapus semua buku dari keranjang.']);
    }
}
