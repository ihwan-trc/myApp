<?php

namespace App\Http\Controllers;

use App\Models\Categoryshops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryshopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Categoryshops::with('descendants');
        if($request->has('keyword') && trim($request->keyword)){
            $categories->search($request->keyword);
        }else{
            $categories->onlyParent();
        }
        return view('dashboard.categoriesShop.index',[
            'categories' => $categories->paginate(5)->appends(['keyword' => $request->get('keyword')])
        ]);
    }

    public function select(Request $request)
    {
        $categories = [];
        if ($request->has('q')) {
            $search = $request->q;
            $categories = Categoryshops::select('id','title')->where('title','LIKE',"%$search%")->limit(6)->get();
        } else {
            $categories = Categoryshops::select('id', 'title')->onlyParent()->get();
        }

        return response()->json($categories);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categoriesShop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //prose validasi data kategori
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:60',
            'slug' => 'required|string|unique:categories,slug',
            'thumbnail' => 'required',
            'description' => 'required|string|max:240',
            ],
            [],
            $this->attribut()
        );

        if($validator->fails()) {
            if($request->has('parent_category')) {
                $request['parent_category'] = Categoryshops::select('id','title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // proses insert data
        try {
            Categoryshops::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'parent_id' => $request->parent_category
            ]);

            Alert::success(trans('categories.alert.create.title'), trans('categories.alert.create.message.success'));
            return redirect()->route('categoriesshop.index');
        } catch (\Throwable $th) {
            if($request->has('parent_category')) {
                $request['parent_category'] = Categoryshops::select('id','title')->find($request->parent_category);
            }
            Alert::error(trans('categories.alert.create.title'), trans('categories.alert.create.message.error',['error' => $th->getMessage()]));
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoryshops  $categoryshops
     * @return \Illuminate\Http\Response
     */
    public function show(Categoryshops $categoryshops)
    {
        dd($categoryshops);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoryshops  $categoryshops
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoryshops $categoryshops)
    {
        // return view('dashboard.categoriesShop.edit',compact('categoryshops'));
        dd($categoryshops);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoryshops  $categoryshops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoryshops $categoryshops)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoryshops  $categoryshops
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoryshops $categoryshops)
    {
        //
    }

    private function attribut()
    {
        return [
            'title' => trans('categories.form_control.input.title.attribute'),
            'slug' => trans('categories.form_control.input.slug.attribute'),
            'thumbnail' => trans('categories.form_control.input.thumbnail.attribute'),
            'description' => trans('categories.form_control.textarea.description.attribute'),
        ];
    }
}
