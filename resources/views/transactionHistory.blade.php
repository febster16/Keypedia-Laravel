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
@if ( $transactions->isEmpty() )
<div class="alert alert-info fade show w-50 mx-auto mt-5 text-center" role="alert">Your Transaction History is Empty.</div>
@else
    <div class="container-fluid mb-5 mt-5 w-50">
    @foreach ($transactions as $t)
    <div class="list-group mb-4">
        <a href="/transactionDetail/{{ $t->id }}" class="list-group-item list-group-item-action border-white shadow-sm">
        <p class="mb-1">Transaction - {{ $loop->iteration }}</p>
        <div class="dropdown-divider"></div>
        <small class="text-muted">{{ $t->created_at }}</small>
        </a>
    </div>
    @endforeach
    </div>
@endif

</body>
</html>
@include('layouts.footer')
