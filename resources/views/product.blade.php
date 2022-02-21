@include('layouts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="/resources/demos/external/jquery-mousewheel/jquery.mousewheel.js"></script>
    <title>Keypedia</title>
</head>
<body>

<div class="container-fluid mb-5 mt-5 w-75">
    <div class="card mb-3 border-white shadow-sm">
        <div class="card-header">Keyboard Detail</div>
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{ Storage::url($product->image) }}" class="img-thumbnail border-white" style="object-fit: contain; height: 400px" alt="{{ $product->name }}'s Image">
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <h3 class="card-text mt-4">US$ {{ $product->price }}</h3>
                @if (Auth::check())
                    @if (Auth::user()->role == 'user')
                    <form action="/cart" method="POST">
                        @csrf
                        <input type="text" style="display: none" name="id" value={{ $product->id }}>
                        <div class="d-flex justify-content-end align-items-center mt-5">
                                <label for="quantity" class="mr-2">Quantity: </label>
                                <input id="spinner" name="quantity" value="0">
                        </div>
                        <button class="btn btn-primary w-100 mt-4" type="submit">Add to Cart</button>


                        @if ($errors->any())
                            <div class="container-fluid">
                                <div class="alert alert-warning alert-dismissible fade show w-100 mx-auto mt-4"  role="alert">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @elseif (session('success'))
                            <div class="container-fluid">
                                <div class="alert alert-success alert-dismissible fade show w-100 mx-auto mt-4"  role="alert">
                                    <p>{{ session('success') }} successfully added to my cart! <a href="/myCart" class="alert-link">Go to my cart.</a></p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </form>
                    @endif
                @endif
            </div>
          </div>
        </div>
    </div>
</div>

</body>
</html>
<script>
   var spinner = $( "#spinner" ).spinner();

    $( "#disable" ).on( "click", function() {
    if ( spinner.spinner( "option", "disabled" ) ) {
        spinner.spinner( "enable" );
    } else {
        spinner.spinner( "disable" );
    }
    });
</script>
@include('layouts.footer')
