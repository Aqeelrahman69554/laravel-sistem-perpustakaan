<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Penerbit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        body { background: #f5f7fb; }
        .hero { background: linear-gradient(135deg, #0d6efd, #4d8dff); color: white; padding: 70px 0; }
        .stat-card { border: none; border-radius: 15px; transition: .3s; }
        .stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0, 0, 0, .15); }
        .table-card { border: none; border-radius: 15px; }
        .table th { background: #0d6efd; color: white; }
        .btn-action { width: 35px; height: 35px; }
        .modal-header { background: #0d6efd; color: white; }
        .navbar { box-shadow: 0 2px 15px rgba(0, 0, 0, .08); }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="bi bi-building"></i> Manajemen Penerbit
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="#" class="nav-link active">Dashboard</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Penerbit</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="fw-bold display-5">Sistem Manajemen Penerbit</h1>
                    <p class="mt-3">Kelola seluruh data penerbit buku secara mudah, cepat, dan efisien menggunakan sistem berbasis web.</p>
                    <button class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="bi bi-plus-circle"></i> Tambah Penerbit
                    </button>
                </div>
                <div class="col-lg-5 text-center">
                    <i class="bi bi-building display-1"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik -->
    <div class="container mt-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card stat-card shadow">
                    <div class="card-body">
                        <h6>Total Penerbit</h6>
                        <h2 class="fw-bold text-primary">{{ $publishers->count() }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card shadow">
                    <div class="card-body">
                        <h6>Buku Terdaftar</h6>
                        <h2 class="fw-bold text-success">412</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card shadow">
                    <div class="card-body">
                        <h6>Aktif</h6>
                        <h2 class="fw-bold text-danger">30</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Halaman Utama Data Tabel -->
    <div class="container mt-5">
        <div class="card table-card shadow">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between">
                    <h4 class="fw-bold">Data Penerbit</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="bi bi-plus"></i> Tambah
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($publishers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->publisher_name }}</td>
                                <td>{{ $item->publisher_email }}</td>
                                <td>{{ $item->publisher_telp }}</td>
                                <td>{{ $item->publisher_address }}</td>
                                <td>
                                    <!-- PERUBAHAN: Target data-bs-target menggunakan ID unik data -->
                                    <button class="btn btn-info btn-sm btn-action" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm btn-action" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm btn-action" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Data Tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ==================== WADAH MODAL GLOBAL ==================== -->

    <!-- 1. Modal Tambah (Berdiri Sendiri, Cukup Satu Karena Form Kosong) -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Penerbit</h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('publisher.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama_publisher" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email_publisher" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="text" name="telp_publisher" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kota</label>
                                <input type="text" class="form-control" placeholder="Yogyakarta" disabled>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat_publisher" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- 2. PERULANGAN UTK MODAL EDIT, DETAIL, DAN HAPUS -->
    <!-- Di sinilah perulangan kedua dipasang agar masing-masing data mendapat jendela modalnya sendiri -->
    @foreach ($publishers as $item)

        <!-- A. Modal Edit per Data -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Penerbit: {{ $item->publisher_name }}</h5>
                        <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('publisher.update', $item->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <label class="form-label">Nama Penerbit</label>
                            <input name="nama_publisher" class="form-control mb-3" value="{{ $item->publisher_name }}" required>

                            <label class="form-label">Email</label>
                            <input type="email" name="email_publisher" class="form-control mb-3" value="{{ $item->publisher_email }}" required>

                            <label class="form-label">Telepon</label>
                            <input name="telp_publisher" class="form-control mb-3" value="{{ $item->publisher_telp }}" required>

                            <label class="form-label">Alamat</label>
                            <textarea name="alamat_publisher" class="form-control mb-3" required>{{ $item->publisher_address }}</textarea>

                            <div class="modal-footer px-0 pb-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- B. Modal Detail per Data -->
        <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Detail Penerbit</h5>
                        <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th class="w-25">Nama</th>
                                <td>{{ $item->publisher_name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $item->publisher_email }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ $item->publisher_telp }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $item->publisher_address }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- C. Modal Delete per Data -->
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5>Hapus Data</h5>
                        <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('publisher.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body text-center">
                            <h4><i class="bi bi-trash display-4 text-danger"></i></h4>
                            <p>Apakah Anda yakin ingin menghapus data penerbit <strong>{{ $item->publisher_name }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
