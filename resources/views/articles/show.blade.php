@extends('layouts.template')

@section('title', $article->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $article->title }}</h1>
        <p class="blog-post-meta">{{ $article->updated_at }}</p>
        <p>{{ $article->body }}</p>
    </article>
@endsection
