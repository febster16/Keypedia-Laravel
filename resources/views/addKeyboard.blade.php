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
        <div class="container-fluid">
            <div class="alert alert-success alert-dismissible fade show w-50 mx-auto mt-4"  role="alert">
                <p>{{ session('success') }} successfully added!</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="card shadow bg-white rounded w-50 mx-auto mt-5 mb-5">
        <div class="card-header header">
            <p class="h4 pl-3">Add Keyboard</p>
        </div>
        <form action="/addKeyboard" method="POST" class="p-5" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                    <option value="" >Choose a category</option>
                    @foreach ($categories as $c)
                        <option value={{ $c->id }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Keyboard Name</label>
                <input type="text" name="name" id="name" class="form-control form-control" placeholder="enter keyboard name">
            </div>
            <div class="form-group d-flex flex-column">
                <label for="price" class="mr-2">Keyboard Price (USD)</label>
                <input id="spinner" name="price" value = '0'>
            </div>
            <div class="form-group">
                <label for="description">Keyboard Description</label>
                <textarea class="form-control" name="description" id="description" rows="5" ></textarea>
            </div>
            <div class="form-group d-flex flex-column">
                <label for="image">Keyboard Image</label>
                <input type="file" name="image" class="image" id="image">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-4">Add</button>
          </form>
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
