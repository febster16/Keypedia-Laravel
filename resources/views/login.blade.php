@include('layouts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keypedia Login</title>
</head>
<body>
    <div class="card shadow bg-white rounded w-50 mx-auto mt-5">
        <div class="card-header header">
            <p class="h4 pl-3">Login</p>
        </div>
        <form action="/login" method="POST" class="p-5">
            @csrf
            <div class="form-group">
                <label for="email">E-mail Address</label>
                <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="email@example.com"
                value={{Cookie::get('email') !== null ? Cookie::get('email') : ""}}>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="enter your password"
                value={{Cookie::get('password') !== null ? Cookie::get('password') : ""}}>
            </div>
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
              </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show w-50 mx-auto mt-5"  role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</body>
</html>
@include('layouts.footer')
