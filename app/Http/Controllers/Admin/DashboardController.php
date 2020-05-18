<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalBukudiPinjam  = DB::table('loans')->count();
        $totalSemuaBuku     = DB::table('books')->count();
        $kategoriTerfavorit = Category::withCount('loans')
                            ->whereHas('loans', function ($query) {
                                $query->whereMonth('loans.created_at', Carbon::now()->month);
                            })
                            ->orderBy('loans_count', 'desc')
                            ->take(3)
                            ->get();
        $judulBukuTerfavorit = Book::withCount('loans')
            ->whereHas('loans', function ($query) {
                $query->whereMonth('created_at', Carbon::now()->month);
            })
            ->orderBy('loans_count', 'desc')
            ->take(3)
            ->get();
        return view('admin.dashboard.index', compact('totalBukudiPinjam','totalSemuaBuku','kategoriTerfavorit','judulBukuTerfavorit'));
    }
}
