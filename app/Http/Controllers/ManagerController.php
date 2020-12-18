<?php

namespace App\Http\Controllers;

use App\Flower;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
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
        $this->validate($request,[
            'flower_name'=>'filled|unique:flowers,flower_name|min:5',
            'flower_price'=>'filled|integer|digits_between:50000,10000000',
            'flower_desc'=>'filled|min:20',
            'flower_img'=>'nullable'
        ]);

//            $input = $request->all();
//            $flower = DB::table('flowers')->find($id);
//            $flower->flower_name = $input['flower_name'];
//            $flower->flower_price= $input['flower_price'];
//            $flower->category_id = $input['category_id'];
//
//            $flower->update();



        $flower = DB::table('flowers')->where('id',$id);
        $flower->update([
            'flower_name'=>$request->input('flower_name'),
            'flower_price'=>$request->input('flower_price'),
            'flower_desc'=>$request->input('flower_desc'),
            'category_id'=>$request->input('category_id')
        ]);

//            if ($request->filled('flower_img'))
//            {
//                $flower->update([
//                    'flower_img'=> bcrypt($request->input('flower_img'))
//                ]);
//            }
        return redirect()->back()->with(['success' => 'Flower updated!']);
    }


    //update category
    public function updateCategory($id)
    {
        $category = collect(DB::select('select * from categories'))->where('id',$id)->first();
        return view('Manager/UpdateCategory',compact('category'));
    }


    //save update category
    public function saveUpdateCategory(Request $request,$id)
    {
        $this->validate($request,[
            'category_name'=>'filled|unique:categories,category_name|min:5',
            'category_img'=>'nullable'
        ]);


        $category = DB::table('categories')->where('id',$id);
//        $category->update([
//            'category_name'=>$request->input('category_name')
//        ]);

        if ($request->hasFile('category_img')){
            $file = $request->file('category_img');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $newFilename = $filename.'.'.$extension;
            $file->move('assets/',$newFilename);
            $category->category_img = $newFilename;

            $category->update([
                'category_name'=>$request->input('category_name'),
                'category_img'=>$newFilename
            ]);

        }else{
            $category->update([
                'category_name'=>$request->input('category_name')
            ]);
        }
        return redirect()->back()->with(['success' => 'Category updated!']);
    }


    //view flower detail
    public function detailPage($id)
    {
        $flower = collect(DB::select('select * from flowers'))->where('id',$id)->first();
        return view('Manager/FlowerDetail',compact('flower'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flowers = new Flower();
        $flowers->name = $request->input('flower_name');
        $flowers->price = $request->input('flower_price');
        $flowers->name = $request->input('flower_name');
        $flowers->name = $request->input('flower_name');
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
