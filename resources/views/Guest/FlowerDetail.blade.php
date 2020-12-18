<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>

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
<div style="margin-top: 50px">

</div>

<div class="container" style="padding: 20px;background-color: white;display: flex">
    <div class="row">
        <div class="col" style="text-align: center">
            <img src="{{asset('assets/'.$flower->flower_img)}}" style="height: 350px;width: auto; margin-right: 20px">
        </div>
        <div class="col" >
            <h2 style="color: palevioletred"><b>{{$flower->flower_name}}</b></h2>
            <h4>Rp. {{$flower->flower_price}}</h4>
            <h4>{{$flower->flower_desc}}</h4>

            <div style="height: 20px">&nbsp;</div>
            Quantity: <input type="number" min="0" max="100" value="1">
            <div> &nbsp;</div>
            <a class="btn btn-primary" href="{{url('/login')}}">Add to Cart</a>
        </div>
    </div>



</div>
</body>
</html>
