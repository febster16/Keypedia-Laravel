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
    <h3 class="text-center mt-5 mb-4">Manage Categories</h3>
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
    <div class="container mb-5">
        <div class="row row-cols-1 row-cols-md-4 ">
            @foreach ($categories as $c)
            <div class="col mb-4">
                <a href="/category/{{ $c->id }}" class="text-dark">
                    <div class="card text-center border-light bg-light shadow-sm">
                        <img src="{{ Storage::url($c->image) }}" class="card-img-top img-thumbnail" style="object-fit: contain; height: 200px" alt="{{ $c->name }}'s Image">
                        <div class="card-body">
                        <h6 class="card-title">{{ $c->name }}</h6>
                        <form action="/deleteCategory/{{ $c->id }}" method="POST">
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $c->name }} category?')" class="btn btn-outline-danger btn-sm mt-4">Delete Category</button>
                        </form>
                        <a href="/updateCategory/{{ $c->id }}" class="btn btn-success btn-sm mt-4">Update Category</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>
@include('layouts.footer')

