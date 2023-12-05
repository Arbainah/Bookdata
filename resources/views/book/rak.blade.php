@extends('layouts.app')

@section('body')
<h1 class="mb-0">Tambah Rak</h1>
    <form action="{{ route('book.storeRak') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="book_id">Data Buku</label>
            <select class="form-control" id="book_id" name="book_id" required>
                @foreach ($books as $data)
                    <option value="{{ $data->id }}">{{ $data->judul }} - {{ $data->pengarang }} - {{ $data->penerbit }} - {{ $data->tahun }} - {{ $data->kategori }} - {{ $data->halaman }} - {{ $data->jumlah }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Rak</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
@endsection

