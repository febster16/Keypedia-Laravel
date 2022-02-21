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
    <div class="card shadow bg-white rounded w-50 mx-auto mt-5">
        <div class="card-header header">
            <p class="h4 pl-3">Change Password</p>
        </div>
        <form action="/changePassword" method="POST" class="p-5">
            @csrf
            <div class="form-group">
                <label for="password">Current Password</label>
                <input type="password" name="currentPassword" id="password" class="form-control form-control-sm" placeholder="enter your current password">
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="newPassword" id="password" class="form-control form-control-sm" placeholder="enter your new password">
            </div>
            <div class="form-group  mb-4">
                <label for="password">Confirm New Password</label>
                <input type="password" name="confirmPassword" id="password" class="form-control form-control-sm" placeholder="Renter your new password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Update Password</button>
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
    @elseif (session('success'))
            <div class="alert alert-success alert-dismissible fade show w-50 mx-auto mt-5"  role="alert">
                <p>{{ session('success') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
</body>
</html>
@include('layouts.footer')
