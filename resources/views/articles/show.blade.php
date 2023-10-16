@extends('layouts.template')

@section('title', $article->judul)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $article->judul }}</h1>
        <p class="blog-post-meta">{{ $article->updated_at }}</p>
        <p>{{ $article->body }}</p>
    </article>
@endsection
