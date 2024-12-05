<!-- Basic -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!-- Site Metas -->
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

<title>
  E-Commerce
</title>

<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />

<!-- Custom styles for this template -->
<link href="{{asset('css/style.css')}}" rel="stylesheet" />
<!-- responsive style -->
<link href="{{asset('css/responsive.css')}}" rel="stylesheet" />

<style>
  .shop_section .box div[style*="padding: 15px"] a {
    display: inline-block;
    padding: 8px; /* Padding di dalam anchor */
    text-align: center;
    background-color: #f5f5f5; /* Warna latar belakang opsional */
    border-radius: 5px; /* Membuat anchor lebih menarik */
    text-decoration: none; /* Menghilangkan garis bawah */
    color: #333; /* Warna teks */
    transition: 0.3s; /* Efek hover */
  }

  .shop_section .box div[style*="padding: 15px"] a:hover {
    background-color: #ddd; /* Warna saat hover */
    color: #000; /* Warna teks saat hover */
  }

  .detail-box a i {
    font-size: 24px; /* Sesuaikan ukuran ikon */
    color: #333; /* Warna default ikon */
    transition: transform 0.3s ease, color 0.3s ease; /* Efek transisi */
  }

  .detail-box a i:hover[id="heart"] {
    transform: scale(1.2); /* Perbesar ikon saat hover */
    color: red; /* Warna ikon saat hover */
  }

  .detail-box a i:hover[id="cart"] {
    transform: scale(1.2); /* Perbesar ikon saat hover */
    color: green; /* Warna ikon saat hover */
  }

  .nav-link.btn-white {
    background-color: white; /* Tetap putih untuk tombol */
    color: black; /* Warna awal teks dan ikon */
    border: none; /* Hapus border jika ada */
    transition: color 0.3s ease; /* Transisi halus untuk warna */
  }

  .nav-link.btn-white:hover i,
  .nav-link.btn-white:hover span {
    color: red; /* Ubah warna teks dan ikon menjadi merah saat hover */
  }

  /* Tambahkan CSS untuk membuat navbar tetap berada di atas saat di-scroll */
  .header_section {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
  }

  .navbar {
    background: rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  #backtotop {
    position: fixed; /* Tetap terlihat meskipun halaman di-scroll */
    bottom: 20px; /* Jarak dari bawah */
    right: 20px; /* Jarak dari kanan */
    width: 50px; /* Lebar tombol */
    height: 50px; /* Tinggi tombol */
    background-color: #007bff; /* Warna latar tombol */
    color: white; /* Warna ikon */
    border: none; /* Hilangkan border */
    border-radius: 50%; /* Bentuk tombol menjadi bulat */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); /* Tambahkan efek bayangan */
    cursor: pointer; /* Ganti cursor menjadi pointer saat hover */
    z-index: 1000; /* Pastikan tombol berada di atas elemen lainnya */
    display: flex; /* Tampilkan tombol sebagai flexbox */
    justify-content: center; /* Pusatkan ikon secara horizontal */
    align-items: center; /* Pusatkan ikon secara vertikal */
    }

    #backtotop i {
        font-size: 20px; /* Ukuran ikon */
    }

    #backtotop:hover {
        background-color: #0056b3; /* Ubah warna saat hover */
    }

</style>