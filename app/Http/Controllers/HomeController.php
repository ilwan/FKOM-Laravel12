<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil slide aktif, urutkan berdasarkan display_order
        $slides = Slide::where('is_active', true)
                       ->orderBy('display_order', 'asc')
                       ->get();

        return view('frontend', compact('slides'));
    }
    public function eSurat() {
        return view('e-surat');
    }
}
