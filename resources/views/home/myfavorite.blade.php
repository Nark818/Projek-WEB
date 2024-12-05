<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .favorite-container {
            padding: 20px;
        }
        .favorite-card {
            margin-bottom: 20px;
        }
        .favorite-card img {
            width: 300px;
            height: 200px;
            object-fit: cover;
        }
        .favorite-card .btn-danger {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    @include('home.header')

    <div style="height: 120px"></div>

    <!-- Favorite Products -->
    <div class="container favorite-container">
        @foreach ($favorite as $fav)
            <div class="card bg-white shadow favorite-card d-flex flex-row">
                <img src="{{asset('/produks/'.$fav->produk->image)}}" alt="produk" class="rounded-2">
                <div class="p-3 w-100 d-flex flex-column justify-content-between">
                    <h5 class="mb-1">{{$fav->produk->name}}</h5>
                    <p class="text-muted small">{{$fav->produk->description}}</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{url('delete_favorite',$fav->id)}}" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i> Remove
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- info section -->
    @include('home.footer')
</body>

</html>
