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
                        <a class="dropdown-item" href="#">Manage Category</a>
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
<div style="margin-top: 50px">

</div>

<div class="container" style="padding: 20px;background-color: white;display: flex">
    <div class="row">
        <div class="col-sm">
            <form method="post" action="{{url('/addFlower')}}/{{$flower->id}}">
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="Category" class="col-sm col-form-label">Category</label>
                    <div class="col-sm" style="width: 500px">
                        <select class="form-control" id="list_category" name="list_category" style="height: 30px">
                                @foreach($categories as $category)
                                    <option value="" name="category_id"
                                        {{$category->id == $flower->category_id? 'selected' : ''}}>
                                        {{$category->category_name}}
                                    </option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row" >
                    <label for="FlowerName" class="col-sm col-form-label">Flower Name</label>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="flowerName" name="flower_name" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="FlowerPrice" class="col-sm col-form-label">Flower Price</label>
                    <div class="col-sm">
                        <input type="number" class="form-control" min="0" max="1000000" name="flower_price" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="FlowerDesc" class="col-sm col-form-label">Flower Description</label>
                    <div class="col-sm">
                        <textarea class="form-control" name="flower_desc"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="FlowerImg" class="col-sm col-form-label">Flower Image</label>
                    <div class="col-sm">
                        <input type="file" class="form-control" style="border: none" name="flower_img">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm col-form-label"></label>
                    <div class="col-sm">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
