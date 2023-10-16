<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|min:5|max:255',
            'halaman' => 'integer',
            'kategori' => 'required|String',
            'penerbit' => 'required|string'
        ]);


        $article = Article::create([
            'judul' => $validated['judul'],
            'halaman' => $validated['halaman'] ?? 0,
            'kategori' => $validated['kategori'],
            'penerbit' => $validated['penerbit'],
            'published_at' => $request->has('is_published') ? Carbon::now() : null,

        ]);
        return redirect()->route('articles.index')->with('success', 'Article Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'judul' => 'required|string|min:5|max:255',
            'halaman' => 'integer',
            'kategori' => 'required|String',
            'penerbit' => 'required|string'
        ]);


        $article = Article::create([
            'judul' => $validated['judul'],
            'halaman' => $validated['halaman'] ?? 0,
            'kategori' => $validated['kategori'],
            'penerbit' => $validated['penerbit'],
            'published_at' => $request->has('is_published') ? Carbon::now() : null,

        ]);

        return redirect()->route('articles.index')->with('success', 'Article update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article delete.');
    }
}
