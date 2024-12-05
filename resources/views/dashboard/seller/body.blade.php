<div class="d-flex align-items-center justify-content-between mt-2">
  <div class="d-flex align-items-center">
    <img class="mr-3" width="60" height="60" src="{{ asset('stores/' . $store->image) }}" alt="Store Logo">
    <h2 class="h2 no-margin-bottom text-light mr-3">{{$store->name}} STORE</h2>
  </div>
  <div>
    <a href="{{url('edit_store')}}"><i id="edit" class="fa fa-edit fa-2x text-light"></i></a>
  </div>
</div>

</div>
</div>
<section class="no-padding-top no-padding-bottom">
<div class="container-fluid">

  <div>
    <h3 class="h3 no-margin-bottom text-light mb-4">List Produk</h3>
    <div class="d-flex flex-wrap justify-content-start mt-3">
      @foreach ($produks as $produk)
      <div class="card m-2" style="width: 18rem;">
        <img src="{{ asset('produks/' . $produk->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $produk->name }}</h5>
          <p class="card-text">{{ $produk->description }}</p>
          <a href="{{ url('edit_produk', $produk->id) }}" class="btn btn-warning">Edit</a>
          <a href="{{ url('delete_produk', $produk->id) }}" class="btn btn-danger">Delete</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</div>
</section>
