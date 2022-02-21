@include('layouts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keypedia</title>
</head>
<body>

    <h3 class="text-center mt-5 mb-4">{{ $categoryName->name }}</h3>
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show w-50 mx-auto mt-5 mb-5"  role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session('success'))
        <div class="alert alert-success fade show w-75 mx-auto mt-5 text-center" role="alert">{{ session('success') }} successfully deleted!</div>
    @endif
    @if ( $products->isEmpty() )
        <div class="alert alert-info fade show w-50 mx-auto mt-5 text-center" role="alert">No Products Available.</div>
    @else
    <div class="container-fluid mb-5 w-75">
        <form class="form-inline" action='/search'>
            <div class="row mx-auto"></div>
            <input type="text" style="display: none" name="id" value={{ $categoryName->id }}>
            <div class="col-8">
                <input class="form-control mr-sm-2 w-100" type="search" name="search" placeholder="Search" aria-label="Search">
            </div>
            <div class="col-2">
                <select class="form-control w-100" name="filter">
                    <option value="name">Name</option>
                    <option value="price">Price</option>
                </select>
            </div>
            <div class="col-2">
                <button class="btn btn-outline-success w-100" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="container mb-5">
        <div class="row row-cols-1 row-cols-md-4 ">
                @foreach ($products as $p)
                    <div class="col mb-4">
                        <a href="/product/{{ $p->id }}" class="text-dark">
                            <div class="card text-center border-light bg-light shadow-sm">
                                <img src="{{ Storage::url($p->image) }}" class="card-img-top img-thumbnail" style="object-fit: contain; height: 200px" alt="images">
                                <div class="card-body">
                                <p class="card-title">{{ $p->name }}</p>
                                <h5 class="card-text">US$ {{ $p->price }}</h5>
                                @if(Auth::check())
                                    @if (Auth::user()->role == "manager")
                                        <form action="/deleteProduct/{{ $p->id }}" method="POST">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $p->name }}?')" class="btn btn-outline-danger btn-sm mt-4">Delete Keyboard</button>
                                        </form>
                                        <a href="/updateProduct/{{ $p->id }}" class="btn btn-success btn-sm mt-4">Update Keyboard</a>
                                    @endif
                                @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{$products->links()}}
        </div>
    </div>
    @endif


</body>
</html>
@include('layouts.footer')
