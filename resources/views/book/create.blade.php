@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Tambah Buku</h1>
    <hr />
    <form action="{{ route('book.store') }}" method="POST">
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
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Judul</label>
                <input Judul Buku type="text" name="judul" class="form-control" placeholder="Judul" value="{{ old('judul') }}">
            </div>
            <div class="col">
                <label class="form-label">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" value="{{ old('pengarang') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="{{ old('penerbit') }}">
            </div>
            <div class="col">
                <label class="form-label">Tahun Terbit</label>
                <input type="text" name="tahun" class="form-control" placeholder="Tahun Terbit" value="{{ old('tahun') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" placeholder="Kategori" value="{{ old('kategori') }}">
            </div>
            <div class="col">
                <label class="form-label">Jumlah Halaman</label>
                <input type="text" name="halaman" class="form-control" placeholder="Jumlah Halaman" value="{{ old('halaman') }}">
            </div>
            <div class="col">
                <label class="form-label">Jumlah Buku</label>
                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Buku" value="{{ old('jumlah') }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection


