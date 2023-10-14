<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $Books = Book::query()->latest()->paginate(7);
        $featured = $Books->shift();
        return view('landing', compact('Books', 'featured'));
    }
}
