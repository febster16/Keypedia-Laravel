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
        <div class="card-header">Update Category</div>
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{ Storage::url($category->image) }}" class="img-thumbnail border-white" style="object-fit: contain; height: 400px" alt="{{ $category->name }}'s Image">
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <form action="/updateCategory" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" style="display: none" name="id" value={{ $category->id }}>
                    <div class="form-group">
                            <label for="name">Category name</label>
                            <input type="text" name="name" id="name" class="form-control form-control" placeholder="Enter category name"
                            value="{{ $category->name !== null ? $category->name : ""}}">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="image">Category Image</label>
                        <input type="file" name="image" class="image" id="image">
                    </div>
                    <button class="btn btn-primary w-100 mt-4" type="submit">Update</button>


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
                                <p>{{ session('success') }} successfully updated!</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </form>
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
