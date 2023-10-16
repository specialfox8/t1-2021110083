@extends('layouts.template')

@section('title', 'Update Article')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Update Article</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul"
                        value="{{ old('judul', $article->judul) }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="page" class="form-label">Halaman</label>
                    <input style="border: 2px solid Black" class="form-control" type="number" id="page" name="page"
                        value="{{ old('page', $article->page) }}">

                </div>

                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
