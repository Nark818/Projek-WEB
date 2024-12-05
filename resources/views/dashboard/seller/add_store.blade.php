<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Store</title>
    @include('dashboard.css')
</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="container rounded shadow p-4 mt-5" style="max-width: 800px; background-color: #f8f9fa;">
            <h2 class="text-center mb-4 text-black">Add Store</h2>
            <form action="{{ url('save_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Nama Toko -->
                <div class="mb-3">
                    <label class="form-label text-black">Nama Toko</label>
                    <input type="text" class="form-control" id="storeName" name="name" placeholder="Masukkan nama toko" required>
                </div>
                <!-- Deskripsi Toko -->
                <div class="mb-3">
                    <label class="form-label text-black">Deskripsi Toko</label>
                    <textarea class="form-control" id="storeDescription" name="description" rows="4" placeholder="Masukkan deskripsi toko"></textarea>
                </div>
                <!-- Alamat Toko -->
                <div class="mb-3">
                    <label class="form-label text-black">Alamat Toko</label>
                    <textarea class="form-control" id="storeAddress" name="address" rows="3" placeholder="Masukkan alamat toko" required></textarea>
                </div>
                <!-- Gambar Toko -->
                <div class="mb-3">
                    <label class="form-label text-black">Gambar Toko</label>
                    <input type="file" class="form-control" id="storeImage" name="image" accept="image/*">
                </div>
                <!-- Tombol Submit -->
                <div class="d-grid">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript files -->
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
