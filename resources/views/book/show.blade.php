@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Detail Buku</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" placeholder="Judul" value="{{ $books->title }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Pengarang</label>
            <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" value="{{ $books->pengarang }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="{{ $books->penerbit }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="text" name="tahun" class="form-control" placeholder="Tahun Terbit" value="{{ $books->tahun }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" placeholder="Kategori" value="{{ $books->kategori }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Jumlah Halaman</label>
            <input type="text" name="halaman" class="form-control" placeholder="Jumlah Halaman" value="{{ $books->halaman }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Jumlah Buku</label>
            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Buku" value="{{ $books->jumlah }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Rak</label>
            <input type="text" name="rak" class="form-control" placeholder="Rak" value="{{ $books->raks->name ?? 'Tidak ada data rak'}}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="{{ $books->raks->description ?? 'Tidak ada data deskripsi' }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $books->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $books->updated_at }}" readonly>
        </div>
    </div>
@endsection
