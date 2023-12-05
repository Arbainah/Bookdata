@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Buku</h1>
    <hr />
    <form action="{{ route('book.update', $books->id) }}" method="POST">
        @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <div class="alert-title"><h4>Data gagal disimpan!</h4></div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul" value="{{ $books->judul }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" value="{{ $books->pengarang }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="{{ $books->penerbit }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="text" name="tahun" class="form-control" placeholder="Tahun" value="{{ $books->tahun }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" placeholder="kategori" value="{{ $books->kategori }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Halaman Buku</label>
                <input type="text" name="halaman" class="form-control" placeholder="Halaman Buku" value="{{ $books->halaman }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Jumlah Buku</label>
                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Buku" value="{{ $books->jumlah }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="name">Rak</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $books->raks->name }}" required>
            </div>
            <div class="col mb-3">
                <label for="description">Deskripsi</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $books->raks->description }}" required>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
