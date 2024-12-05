<!DOCTYPE html>
<html>

<head>

    @include('home.css')

</head>

<body>
  <div id='hero'></div>
  @include('home.header')

  @include('home.slider')

  <!-- shop section -->

    @include('home.produk')

  <!-- end shop section -->


  <!-- contact section -->

    @include('home.contact')

  <!-- end contact section -->

  {{-- <button id="backtotop"><i class="fa fa-arrow-up"></i></button> --}}
  <a href="#hero" style="text-decoration: none" id="backtotop"><i class="fa fa-arrow-up"></i></a>

  <!-- info section -->

@include('home.footer')

</body>

</html>