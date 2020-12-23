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

    </style>
    <title>Manage Category</title>
</head>

<body style="background-color: linen">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fd3a69">
    <a class="navbar-brand" href="{{url('/managerhome')}}">Flowelto Shop</a>
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
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('/addFlowerPage')}}">Add Flower</a>
                        <a class="dropdown-item" href="{{url('/manageCategories')}}">Manage Category</a>
                        <a class="dropdown-item" href="{{ route('password.request') }}">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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

<div class="container" style="text-align: center">
    <header class="PageHeader">
        <h2 style="font-style: italic;font-weight: bold; font-family: Monospaced">Manage Categories</h2>
    </header>
</div>



<div class="container">
    @include('flash-message')
    <div class="row" style="text-align: center;">
        @foreach($categories as $category)
            <div class="card" style="width: 265px;padding: 10px; margin:10px ;text-align: center;">
                    <img class="card-img-top" style="height: 200px; padding: 5px" src="{{asset('assets/'.$category->category_img)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="color: palevioletred">{{$category->category_name}}</h5>
                    </div>
                <form class="form-inline" style="margin: auto">
                    <a href="{{url('deleteCategory')}}/{{$category->id}}"  class="btn btn-danger"
                       id="delete_category" style="font-size: smaller">Delete Category</a>
                    <label>&nbsp;</label>
                    <a href="{{url('updateCategory')}}/{{$category->id}}" class="btn btn-primary" style="font-size: smaller">Update Category</a>
                </form>
            </div>
        @endforeach
    </div>

</div>
</body>
</html>
