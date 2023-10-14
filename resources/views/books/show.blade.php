@extends('layouts.template')

@section('title', $book->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $book->title }}</h1>
        <p class="blog-post-meta">{{ $Book->updated_at }}</p>
        @if ($book->image)
            <img src="{{ $book->image_url }}" class="rounded mx-auto d-block my-3">
        @endif
        <p>{{ $article->body }}</p>
    </article>
@endsection
