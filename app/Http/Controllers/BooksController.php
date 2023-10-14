<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    public function index()
    {
        // $articles = Article::all();
        $Books = Book::paginate(5);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg,jiff|max:2048'
            ]);

            $imagePath = $request->file('image')->store('public/images');

            $validated['image'] = $imagePath;
        }

        $article = Book::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'published_at' => $request->has('is_published') ? Carbon::now() : null,
            'image' => $validated['image'] ?? null
        ]);

        return redirect()->route('articles.index')->with('success', 'Article Added.');
        // return $article;
        // dump($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $Book)
    {
        return view('Books.show', compact('Book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $Book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $Book)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg,jiff|max:2048'
            ]);

            $imagePath = $request->file('image')->store('public/images');

            if ($Book->image) {
                Storage::delete($Book->image);
            }

            $validated['image'] = $imagePath;
        }

        $Book->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $validated['image'] ?? $Book->image,
            'published_at' => $request->is_published ? Carbon::now() : null
        ]);

        return redirect()->route('articles.index')->with('success', 'Article update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $Book)
    {
        if ($Book->image) {
            Storage::delete($Book->image);
        }
        $Book->delete();

        return redirect()->route('Books.index')->with('success', 'Book delete.');
    }
}
