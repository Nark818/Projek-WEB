<!DOCTYPE html>
<html>
<head>
    @include('dashboard.css')
    <style>
        h1 {
            color: white;
        }

        label {
            display: inline-block;
            width: 250px;
            font-size: 15px!important;
            color: white!important;
            vertical-align: top; /* Align label with the top of the textarea */
        }

        input[type='text'], input[type='file'], textarea {
            width: 100%;
            max-width: 450px;
            height: 50px;
            margin-bottom: 15px;
        }

        textarea {
            height: 80px;
        }

        .form-group img {
            display: inline-block;
            vertical-align: middle;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 16px;
        }

        .form-container {
            margin-bottom: 50px; /* Add margin to create space between form and footer */
        }
    </style>
</head>
<body>
    @include('dashboard.header')
    @include('dashboard.seller.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Edit Store</h1>
            </div>
        </div>

        <div class="container-fluid form-container">
            <form action="{{ url('update_store', $store->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $store->name }}" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" required>{{ $store->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="{{ $store->address }}" required>
                </div>
                <div class="form-group">
                    <label>Current Store Image</label>
                    @if ($store->image)
                        <img src="{{ asset('stores/' . $store->image) }}" alt="Store Image" width="100">
                    @endif
                </div>
                <div class="form-group">
                    <label>Store Image</label>
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Update Store</button>
            </form>
        </div>

        <footer class="footer">
            <div class="footer__block block no-margin-bottom">
                <div class="container-fluid text-center">
                    <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>
</html>