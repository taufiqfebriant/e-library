<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Loan;
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
                            ->has('loans' , '>' , 0)
                            ->orderBy('loans_count' , 'desc')
                            ->take(3)
                            ->get();
        $judulBukuTerfavorit = DB::table('loans')
                            ->select('book_id')
                            ->groupBy('book_id')
                            ->havingRaw('COUNT(*) > 1')
                            ->orderBy('book_id','desc')
                            ->limit(3)
                            ->get();
                        
        return view('admin.dashboard.index',compact('totalBukudiPinjam','totalSemuaBuku','kategoriTerfavorit','judulBukuTerfavorit'));
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
