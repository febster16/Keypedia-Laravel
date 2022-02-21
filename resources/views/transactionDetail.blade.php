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
@if ( $details->isEmpty() )
<div class="alert alert-info fade show w-50 mx-auto mt-5 text-center" role="alert">Your Transaction Details is Empty.</div>
@else
    <h3 class="text-center mt-5 mb-4">Your Transaction at {{ $transaction->created_at }}</h3>

    <div class="container-fluid mb-5 mt-5 w-50">
        <div class="card mb-3 border-white shadow-sm">
            @foreach ($details as $d)
            <div class="row no-gutters">
            @if( File::exists(public_path('storage/'.$d->image)) )
                <div class="col-md-4">
                    <img src="{{ Storage::url($d->image) }}" class="img-thumbnail  border-white" style="object-fit: contain; height: 200px" alt="{{ $d->name }}'s Image">
                </div>
            @else
                <img src="{{ Storage::url('images/defaultImage.jpg') }}" class="img-thumbnail  border-white" style="object-fit: contain; height: 200px" alt="Image not Found">

            @endif
            <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $d->name }}</h5>
                        <p class="mt-4">Subtotal: </p>
                        <h3 class="card-text">US$ {{ $d->subtotal }}</h3>
                        <p class="mt-4">Quantity: {{ $d->quantity }}</p>
                    </div>
            </div>
            </div>
            <div class="dropdown-divider"></div>
            @endforeach
        </div>
        <h3 class="d-flex justify-content-end mb-5 mt-2">Total Price: US$ {{ $totalPrice }}</h3>
    </div>
@endif

</body>
</html>
@include('layouts.footer')
