<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = DB::select('select * from categories');
        return view('User/UsersHome',compact('categories'));

    }

    //Untuk mengarahkan ke view based on category
    public function categoriesCheck( $id )
    {
        $categories = DB::table('categories')->where('id',$id)->first();
        $categories_flower = DB::table('flowers')->where('category_id',$id)->get();
        $cid = $id;
        return view('User/UsersVFlower',compact('categories_flower','categories'));
    }

    public function detailPage($id)
    {
        $flower = collect(DB::select('select * from flowers'))->where('id',$id)->first();
        return view('User/FlowerDetail',compact('flower'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
