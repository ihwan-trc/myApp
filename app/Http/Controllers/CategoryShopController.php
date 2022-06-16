<?php

namespace App\Http\Controllers;

use App\Models\CategoryShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryShopController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:category_show',['only' => 'index']);
    //     $this->middleware('permission:category_create',['only' => ['create','store']]);
    //     $this->middleware('permission:category_update',['only' => ['edit','update']]);
    //     $this->middleware('permission:category_detail',['only' => 'show']);
    //     $this->middleware('permission:category_delete',['only' => 'destroy']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $categories = CategoryShop::with('descendants');
    //     if($request->has('keyword') && trim($request->keyword)){
    //         $categories->search($request->keyword);
    //     }else{
    //         $categories->onlyParent();
    //     }

    //     return view('categoriesshop.index', [
    //         'categories' => $categories->paginate(5)->appends(['keyword' => $request->get('keyword')])
    //     ]);
    // }

    public function index()
    {
        $categories = CategoryShop::all();
        return view('categoriesshop.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoriesshop.create');
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
     * @param  \App\Models\CategoryShop  $categoryShop
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryShop $categoryShop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryShop  $categoryShop
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryShop $categoryShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryShop  $categoryShop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryShop $categoryShop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryShop  $categoryShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryShop $categoryShop)
    {
        //
    }
}
