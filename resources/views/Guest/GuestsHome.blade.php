<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>


    <style type="text/css">
        .PageHeader{
            text-align: center;
            margin: 30px;
        }
        .small-container{
            margin: auto;
            width: 60%;
            text-align: center;
        }


    </style>
    <title>Home</title>
</head>

<body style="background-color: linen">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fd3a69">
    <a class="navbar-brand" href="#">Flowelto Shop</a>
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
                            <a class="dropdown-item" href="{{url('/guestVF',$liCat->id)}}">{{$liCat->category_name}}</a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Register
                    </a>
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

<div class="container" style="text-align: center">
    <header class="PageHeader">
        <h2 style="font-style: italic;font-weight: bold; font-family: Monospaced"> Welcome to Flowelto Shop</h2>
        <h2 style="font-weight: bold; font-size: 20px; font-family: Monospaced">Best Flower Shop in Binus University</h2>
    </header>

    <div class="small-container">
        <div class="row" style="text-align: center; padding: 20px">
            @foreach($categories as $category)
                <div class="col" style="margin: 20px">
                    <a  href="{{url('/guestVF',$category->id)}}" style="color: black">
                        <div class="card" style="width: 250px; text-align: center">
                            <img class="card-img-top" style="height: 200px" src="{{asset('assets/'.$category->category_img)}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ucwords($category->category_name)}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>
</body>
</html>
