@extends('layouts.template')

@section('title', 'Add New Books')

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

    <div class="row my-5 ">
        <div class="col-12 px-5">
            <form action="{{ route('articles.store') }}" method="POST">
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="judul" class="form-label">Judul</label>
                    <input style="border: 2px solid Black" type="text" class="form-control" id="judul" name="judul"
                        value="{{ old('judul') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="page" class="form-label">Halaman</label>
                    <input style="border: 2px solid Black" class="form-control" type="number" id="page" name="page"
                        value="0">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">

                    <label for="kategori">Kategori</label method="post">
                    <select name="kategori" id="kategori">
                        <option value="uncategorized" selected>Uncategorized</option>
                        <option value="">Science Fiction</option>
                        <option value="">Novel</option>
                        <option value="">History</option>
                        <option value="">Biography</option>
                        <option value="">Romance</option>
                        <option value="">Education</option>
                        <option value="">Culinary</option>
                        <option value="">Comic</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input style="border: 2px solid Black" type="text" class="form-control" id="penerbit"
                        name="penerbit">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
