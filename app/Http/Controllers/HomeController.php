<?php

namespace App\Http\Controllers;
use App\Book;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    public function index()
    {
        $top10Books = Book::withCount('loans')->has('loans', '>', 0)->take(10)->get();
        $latestBooks = Book::latest()->take(10)->get();
        $featuredBooks = Book::featured()->get();
        if (auth()->check()) {
            $userCategories = auth()->user()->categories()->pluck('id')->toArray();
            $userBookLoans = auth()->user()->loans()->pluck('book_id')->toArray();
            $recommendedBooks = Book::whereIn('category_id', $userCategories)
            ->whereNotIn('id', $userBookLoans)
            ->get();
        } else {
            $recommendedBooks = [];
        }

        // SEO
        // SEOTools::setDescription('Rumah Baca dan Hasilkan Karya (Rumah Cahaya) FLP Saudi')
        return view('home.index', compact('latestBooks', 'featuredBooks', 'top10Books', 'recommendedBooks'));
    }
}
