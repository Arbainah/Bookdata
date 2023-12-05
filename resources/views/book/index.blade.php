@extends('layouts.app')
<head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
    @section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">DAFTAR BUKU</h1>
        <a href="{{ route('book.create') }}" class="btn btn-success ml-auto mr-2"><i class="fa fa-book" aria-hidden="true"></i> Tambah Buku</a>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahRakModal" >Tambah Rak</a>
    </div>
    <div class="modal fade" id="tambahRakModal" tabindex="-1" role="dialog" aria-labelledby="tambahRakModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahRakModalLabel">Tambah Rak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('book.storeRak') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="book_id">Data Buku</label>
                            <select class="form-control" id="book_id" name="book_id" required>
                                @foreach ($books as $data)
                                    <option value="{{ $data->id }}">{{ $data->judul }} - {{ $data->pengarang }}-{{ $data->penerbit }} - {{ $data->tahun }}-{{ $data->kategori }} - {{ $data->halaman }} - {{ $data->jumlah }}</option>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Jumlah Hal</th>
                <th>Jumlah Buku</th>
                <th>Rak</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($books->count() > 0)
                @foreach($books as $book)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $book->judul }}</td>
                        <td class="align-middle">{{ $book->pengarang }}</td>
                        <td class="align-middle">{{ $book->penerbit }}</td>
                        <td class="align-middle">{{ $book->tahun }}</td>
                        <td class="align-middle">{{ $book->kategori }}</td>
                        <td class="align-middle">{{ $book->halaman }}</td>
                        <td class="align-middle">{{ $book->jumlah }}</td>
                        <td class="align-middle">
                            @if ($book->raks)
                                    {{ $book->raks->name }}
                                @else
                                    Rak tidak tersedia
                                @endif
                            </td>
                            <td class="align-middle">
                                @if ($book->raks)
                                    {{ $book->raks->description }}
                                @else
                                    Deskripsi tidak tersedia
                                @endif
                        </td>
                        <td class="col-md-2">
                                <a href="{{ route('book.show', $book->id) }}" type="button" class="btn btn-secondary">
                                    <i class="fas fa-info-circle fa-xs"></i>
                                </a>
                                <a href="{{ route('book.edit', $book->id)}}" type="button" class="btn btn-warning">
                                    <i class="fas fa-edit fa-xs"></i>
                                </a>
                                <form action="{{ route('book.destroy', $book->id) }}" method="POST" type="button" class="btn p-0 mt-3" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash fa-xs"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Buku tidak tersedia</td>
                </tr>
            @endif
            </form>
        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection
