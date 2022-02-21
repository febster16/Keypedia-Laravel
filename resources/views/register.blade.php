@include('layouts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
</head>
<body>
    <body>
        <div class="card shadow bg-white rounded w-50 mx-auto mt-5">
            <div class="card-header header">
                <p class="h4 pl-3">Register</p>
            </div>
            <form action="/register" method="POST" class="p-5">
                @csrf
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="enter your username">
                </div>
                <div class="form-group">
                    <label for="email">E-mail Address</label>
                    <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="email@example.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="enter your password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control form-control-sm" placeholder="re-enter your password">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="3" placeholder="enter your address"></textarea>
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male">
                        <label class="form-check-label" for="genderMale">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female">
                        <label class="form-check-label" for="genderFemale">Female</label>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="birth">Date of Birth</label>
                    <input type="text" name="birth" id="birth" class="form-control form-control-sm" placeholder="YYYY-MM-DD">
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
              </form>
        </div>

        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show w-50 mx-auto mb-5 mt-5"  role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </body>
</body>
</html>
@include('layouts.footer')
