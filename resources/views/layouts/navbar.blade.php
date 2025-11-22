<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi bi-book"></i> Perpustakaan Online
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <form action="{{ route('search') }}" method="GET" class="d-flex ms-auto">
                <input class="form-control me-2"
                       type="text"
                       name="keyword"
                       placeholder="Cari buku atau penulis..."
                       value="{{ request('keyword') }}"
                       autocomplete="off"
                       >
                <button class="btn btn-outline-light" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
