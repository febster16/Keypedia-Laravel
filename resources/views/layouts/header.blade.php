<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <title>Keypedia</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-5 text-primary" href="/home">Keypedia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mr-5" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Categories
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $c)
                            <a class="dropdown-item" href="/category/{{ $c->id }}">{{ $c->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    @if (Auth::user()->role == 'manager')
                    <li class="nav-item dropdown pr-4">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Manager
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/addKeyboard">Add Keyboard</a>
                            <a class="dropdown-item" href="/manageCategory">Manage Categories</a>
                            <a class="dropdown-item" href="/changePassword">Change Password</a>
                            <form action="/logout" method="GET">
                                <button class="dropdown-item text-danger" type="submit">Logout</button>
                            </form>
                        </div>
                    </li>
                    @elseif (Auth::user()->role == 'user')
                    <li class="nav-item dropdown pr-4">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        User
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/myCart">My Cart</a>
                            <a class="dropdown-item" href="/transactionHistory">Transaction History</a>
                            <a class="dropdown-item" href="/changePassword">Change Password</a>
                            <form action="/logout" method="GET">
                                <button class="dropdown-item text-danger" type="submit">Logout</button>
                            </form>
                        </div>
                    </li>
                    @endif

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item pr-4">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endif
                    <span class="navbar-text text-dark">
                        {{$date->format('D, d-M-Y')}}
                    </span>
                    </ul>
        </div>
    </nav>
</body>
</html>
