<?php

namespace App\Http\Controllers;

use App\Flower;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use Illuminate\Support\Facades\Validator;


class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function __construct() {
        $this->middleware('auth');
    }
    //show category di home page
    public function index()
    {
        $categories = DB::select('select * from categories');
        return view('Manager/ManagerHome',compact('categories'));
    }

    //Untuk mengarahkan ke view based on category
    public function categoriesCheck( $id )
    {
        $categories = DB::table('categories')->where('id',$id)->first();
        $categories_flower = DB::table('flowers')->where('category_id',$id)->get();
        $cid = $id;
        return view('Manager/ManagerVFlower',compact('categories_flower','categories'));
    }

    //Manage Categoris
    public function manageCategory()
    {
        $categories = DB::select('select * from categories');
        return view('Manager/ManageCategory',compact('categories'));
    }

    //Delete Category
    public function deleteCategory($id)
    {
        $flower = DB::table('flowers')->where('category_id',$id);
        $category = DB::table('categories')->where('id',$id);
        $flower->delete();
        return redirect()->back()->with(['success' => 'All flowers with this category successfully deleted']);
    }

    //update flower
    public function updateFlower($id)
    {
        $categories = DB::table('categories')->get();
        $flower = collect(DB::select('select * from flowers'))->where('id',$id)->first();
        return view('Manager/UpdateFlower',compact('flower','categories'));
    }

    //save update flower
    public function saveUpdateFlower(Request $request,$id)
    {
        $validatedData = $request->validate([
            'flower_name' => ['filled', 'unique:flowers', 'min:5'],
            'flower_price' => ['filled','integer','gt:50000'],
            'flower_decs'=>['filled','min:20'],
            'category_id'=>['filled'],
        ]);

            $input = $request->all();
            $flower = DB::table('flowers')->find($id);
            $flower->flower_name = $input['flower_name'];
            $flower->flower_price= $input['flower_price'];
            $flower->category_id = $input['category_id'];
            $flower->flower_img = $input['flower_img'];

            $flower->update();

//
//
//        $flower = DB::table('flowers')->where('id',$id);
//        $flower->update([
//            'flower_name'=>$request->input('flower_name'),
//            'flower_price'=>$request->input('flower_price'),
//            'flower_desc'=>$request->input('flower_desc'),
//            'category_id'=>$request->input('category_id'),
//            'flower_img'=>$request->input('flower_img')
//        ]);

        return redirect()->back()->with(['success' => 'Flower updated!']);
    }


    //update category Page
    public function updateCategory($id)
    {
        $category = collect(DB::select('select * from categories'))->where('id',$id)->first();
        return view('Manager/UpdateCategory',compact('category'));
    }


    //save update category
    public function saveUpdateCategory(Request $request,$id)
    {
        $this->validate($request,[
            'category_name'=>'filled|unique:categories,category_name|min:5'
        ]);


        $category = DB::table('categories')->where('id',$id);
        $category->update([
            'category_name'=>$request->input('category_name'),
            'category_img'=>$request->input('category_img')
        ]);

        return redirect()->back()->with(['success' => 'Category updated!']);
    }


    //view flower detail
    public function detailPage($id)
    {
        $flower = collect(DB::select('select * from flowers'))->where('id',$id)->first();
        return view('Manager/FlowerDetail',compact('flower'));
    }


    //page add flower
    public function addFlowerPage()
    {
        $categories = Category::all();
        $flower = Flower::all();

        return view('Manager/addFlower',compact('categories','flower'));
    }

    /**
     * Show the form for creating a new resource.
     * @param array $flower
     * @return \App\Flower
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addFlower(Request $request)
    {

        $validatedData = $request->validate([
            'flower_name' => ['filled', 'unique:flowers', 'min:5'],
            'flower_price' => ['filled','integer','gt:50000'],
            'flower_decs'=>['filled','min:20'],
            'category_id'=>['filled'],
        ]);

        $addFlower = new Flower();
        $addFlower->flower_name = $request->flower_name;
        $addFlower->flower_price = $request->flower_price;
        $addFlower->flower_desc = $request->flower_desc;
        $addFlower->category_id = $request->category_id;
        $addFlower->flower_img = $request->flower_img;

        $addFlower->save();
        return redirect()->back()->with(['success' => 'Flower added!']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $flower = DB::table('flowers')->where('id',$id);
        $flower->delete();

        return redirect()->back()->with(['success' => 'Flower Deleted']);
    }
}
