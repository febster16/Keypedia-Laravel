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
@if ( $carts->isEmpty() )
<div class="alert alert-info fade show w-50 mx-auto mt-5 text-center" role="alert">Your Cart is Empty.</div>
@else
    @if ($errors->any())
        <div class="container-fluid">
            <div class="alert alert-warning alert-dismissible fade show w-75 mx-auto mt-4"  role="alert">
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
                <div class="alert alert-success alert-dismissible fade show w-75 mx-auto mt-4"  role="alert">
                    <p>{{ session('success') }} successfully updated!</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    @endif
    <div class="container-fluid mb-5 mt-5 w-75">
        <div class="card mb-3 border-white shadow-sm">
            <div class="card-header">My Cart</div>
            @foreach ($carts as $c)
            <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ Storage::url($c->keyboard->image) }}" class="img-thumbnail  border-white" style="object-fit: contain; height: 400px" alt="{{ $c->keyboard->name }}'s Image">
            </div>
            <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $c->keyboard->name }}</h5>
                        <p class="mt-4">Subtotal: </p>
                        <h3 class="card-text">US$ {{ $c->keyboard->price * $c->quantity }}</h3>
                            <form action="/updateCart" method="POST">
                                @csrf
                                <input type="text" style="display: none" name="id" value={{ $c->id }}>
                                <div class="d-flex justify-content-end align-items-center mt-5">
                                        <label for="quantity" class="mr-2">Quantity: </label>
                                        <input id="spinner" class="spinner" name="quantity" value={{ $c->quantity}}>
                                </div>
                                <button class="btn btn-success w-100 mt-4" type="submit">Update</button>
                            </form>
                    </div>
            </div>
            </div>
            @endforeach
        </div>
        <form action="/checkout/{{ Auth::user()->id }}" method="POST">
            @csrf
            <button class="btn btn-primary w-100" type="submit">Checkout</button>
        </form>
    </div>
@endif

</body>
</html>
<script>
   var spinner = $( ".spinner" ).spinner();

    $( "#disable" ).on( "click", function() {
    if ( spinner.spinner( "option", "disabled" ) ) {
        spinner.spinner( "enable" );
    } else {
        spinner.spinner( "disable" );
    }
    });
</script>
@include('layouts.footer')
