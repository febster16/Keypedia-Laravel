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
    <div class="jumbotron text-center">
        <h4 class="display-4">Welcome to Keypedia</h4>
        <h6>Best Keyboard and Keycaps Shop</h6>
    </div>
    <h3 class="text-center mb-4">Categories</h3>

    <div class="container mb-5">
        <div class="row row-cols-1 row-cols-md-4 ">
            @foreach ($categories as $c)
            <div class="col mb-4">
                <a href="/category/{{ $c->id }}" class="text-dark">
                    <div class="card text-center border-light bg-light shadow-sm">
                        <img src="{{ Storage::url($c->image) }}" class="card-img-top img-thumbnail" style="object-fit: contain; height: 200px" alt="{{ $c->name }}'s Image">
                        <div class="card-body">
                        <h6 class="card-title">{{ $c->name }}</h6>
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

