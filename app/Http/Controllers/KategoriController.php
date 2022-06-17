<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategori= Kategori::with('descendants');
        if($request->has('keyword') && trim($request->keyword)){
            $kategori->search($request->keyword);
        }else{
            $kategori->onlyParent();
        }
        return view('dashboard.shops.kategori.index', [
            'kategori' => $kategori->paginate(5)->appends(['keyword' => $request->get('keyword')])
        ]);
    }

    public function select(Request $request)
    {
        $kategori = [];
        if ($request->has('q')) {
            $search = $request->q;
            $kategori = Kategori::select('id','title')->where('title','LIKE',"%$search%")->limit(6)->get();
        } else {
            $kategori = Kategori::select('id', 'title')->onlyParent()->get();
        }

        return response()->json($kategori);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.shops.kategori.create');
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
                $request['parent_category'] = Kategori::select('id','title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // proses insert data
        try {
            Kategori::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'parent_id' => $request->parent_category
            ]);

            Alert::success(trans('kategori.alert.create.title'), trans('kategori.alert.create.message.success'));
            return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
            if($request->has('parent_category')) {
                $request['parent_category'] = Kategori::select('id','title')->find($request->parent_category);
            }
            Alert::error(trans('kategori.alert.create.title'), trans('kategori.alert.create.message.error',['error' => $th->getMessage()]));
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        return view('dashboard.shops.kategori.detail',compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('dashboard.shops.kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        //prose validasi data kategori
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:60',
            'slug' => 'required|string|unique:categories,slug,' . $kategori->id,
            'thumbnail' => 'required',
            'description' => 'required|string|max:240',
            ],
            [],
            $this->attribut()
        );

        if($validator->fails()) {
            if($request->has('parent_category')) {
                $request['parent_category'] = Kategori::select('id','title')->find($request->parent_category);
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // proses insert data
        try {
            $kategori->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'parent_id' => $request->parent_category
            ]);

            Alert::success(trans('kategori.alert.update.title'), trans('kategori.alert.update.message.success'));
            return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
            if($request->has('parent_category')) {
                $request['parent_category'] = Kategori::select('id','title')->find($request->parent_category);
            }
            Alert::error(trans('kategori.alert.update.title'), trans('kategori.alert.update.message.error',['error' => $th->getMessage()]));
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
            Alert::success(
                trans('kategori.alert.delete.title'),
                trans('kategori.alert.delete.message.success')
            );
        } catch (\Throwable $th) {
            Alert::error(
                trans('kategori.alert.delete.title'),
                trans('kategori.alert.delete.message.error',['error' => $th->getMessage()]));
        }

        return redirect()->back();
    }

    private function attribut()
    {
        return [
            'title' => trans('kategori.form_control.input.title.attribute'),
            'slug' => trans('kategori.form_control.input.slug.attribute'),
            'thumbnail' => trans('kategori.form_control.input.thumbnail.attribute'),
            'description' => trans('kategori.form_control.textarea.description.attribute'),
        ];
    }
}
