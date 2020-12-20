<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <title>Home</title>
</head>
<body style="background-color: linen">

    {{--    navbar--}}
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fd3a69">
        <a class="navbar-brand" href="{{url('/login')}}">Flowelto Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php use Illuminate\Support\Facades\DB;
                            $liCats = DB::table('categories')->get();?>
                            @foreach($liCats as $liCat)
                                <a class="dropdown-item" href="{{url('/managerVF',$liCat->id)}}">{{$liCat->category_name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            MANAGER
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Add Flower</a>
                            <a class="dropdown-item" href="{{url('/manageCategories')}}">Manage Category</a>
                            <a class="dropdown-item" href="#">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <p>
                                <script> document.write(new Date().toDateString()); </script>
                            </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
