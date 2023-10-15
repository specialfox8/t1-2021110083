@extends('layouts.template')

@section('title', 'Add New Article')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Add New Book</h1>
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
            <form action="{{ route('articles.store') }}" method="POST">
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="page" class="form-label">Halaman</label>
                    <input class="form-control" type="text" id="page" name="page">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <form method="post">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori">
                            <option value="uncategorized">Uncategorized</option>
                            <option value="sci-fi">Science Fiction</option>
                            <option value="novel">Novel</option>
                            <option value="history">History</option>
                            <option value="biography">Biography</option>
                            <option value="romance">Romance</option>
                            <option value="education">Education</option>
                            <option value="culinary">Culinary</option>
                            <option value="comic">Comic</option>
                        </select>

                    </form>

                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
