<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangLog;

class CVController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('cv.index');
    }
}
