<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Data Buku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ route('book.index') }}">Book</a>
                </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search" onsubmit="return confirm('Apakah anda yakin ingin keluar?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-3" type="submit">
                    <i class="fas fa-sign-out-alt"></i></button>
                {{-- <button class="btn btn-danger" type="submit">Logout</button> --}}
            </form>
        </div>
    </div>
</nav>
