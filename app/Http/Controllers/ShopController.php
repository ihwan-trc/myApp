<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Kategori;
use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statusSelected = in_array($request->get('status'),['publish','draft']) ? $request->get('status') : "publish";
        $posts = $statusSelected == "publish" ? Shop::publish()->orderBy('created_at', 'desc') : Shop::draft()->orderBy('created_at', 'desc');
        if ($request->get('keyword')) {
            $posts->search($request->get('keyword'));
        }
        return view('dashboard.shops.index',[
            'posts' => $posts->paginate(10)->withQueryString(),
            'statuses' => $this->statuses(),
            'statusSelected' => $statusSelected
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.shops.create',[
            'kategori' => Kategori::with('descendants')->onlyParent()->get(),
            'statuses' => $this->statuses()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:60',
                'slug' => 'required|string|unique:posts,slug',
                'thumbnail' => 'required',
                'description' => 'required|string|max:240',
                'content' => 'required',
                'category' => 'required',
                'tag' => 'required',
                'status' => 'required',
            ],
            [],
            $this->attributes()
        );

        if ($validator->fails()) {
            if($request['tag']){
                $request['tag'] = Mark::select('id','title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $shop = Shop::create([
                'title' => $request->title,
                'slug'=> $request->slug,
                'thumbnail'=> parse_url($request->thumbnail)['path'],
                'description'=> $request->description,
                'content'=> $request->content,
                'status'=> $request->status,
                'user_id' => Auth::user()->id
            ]);
            $shop->mark()->attach($request->tag);
            $shop->kategori()->attach($request->category);

            Alert::success(
                trans('posts.alert.create.title'),
                trans('posts.alert.create.message.success')
            );
            return redirect()->route('shops.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('posts.alert.create.title'),
                trans('posts.alert.create.message.error',['error' => $th->getMessage()])
            );
            if($request['tag']){
                $request['tag'] = Mark::select('id','title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        $categories = $shop->kategori;
        $marks = $shop->mark;
        return view('dashboard.shops.detail', compact('shop','categories','marks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('dashboard.shops.edit', [
            'shop' => $shop,
            'kategori' => Kategori::with('descendants')->onlyParent()->get(),
            'statuses' => $this->statuses()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:60',
                'slug' => 'required|string|unique:posts,slug,' . $shop->id,
                'thumbnail' => 'required',
                'description' => 'required|string|max:240',
                'content' => 'required',
                'category' => 'required',
                'tag' => 'required',
                'status' => 'required',
            ],
            [],
            $this->attributes()
        );

        if ($validator->fails()) {
            if($request['tag']){
                $request['tag'] = Mark::select('id','title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
            $shop->update([
                'title' => $request->title,
                'slug'=> $request->slug,
                'thumbnail'=> parse_url($request->thumbnail)['path'],
                'description'=> $request->description,
                'content'=> $request->content,
                'status'=> $request->status,
                'user_id' => Auth::user()->id
            ]);
            $shop->mark()->sync($request->tag);
            $shop->kategori()->sync($request->category);

            Alert::success(
                trans('posts.alert.update.title'),
                trans('posts.alert.update.message.success')
            );
            return redirect()->route('shops.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('posts.alert.update.title'),
                trans('posts.alert.update.message.error',['error' => $th->getMessage()])
            );
            if($request['tag']){
                $request['tag'] = Mark::select('id','title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        DB::beginTransaction();
        try {
            $shop->tags()->detach();
            $shop->categories()->detach();
            $shop->delete();
            
            Alert::success(
                trans('posts.alert.delete.title'),
                trans('posts.alert.delete.message.success')
            );
            return redirect()->route('shops.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('posts.alert.delete.title'),
                trans('posts.alert.delete.message.error',['error' => $th->getMessage()])
            );
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }

    private function statuses()
    {
        return [
            'draft' => trans('posts.form_control.select.status.option.draft'),
            'publish' => trans('posts.form_control.select.status.option.publish')
        ];
    }

    private function attributes()
    {
        return [
            'title' => trans('posts.form_control.input.title.attribute'),
            'slug' => trans('posts.form_control.input.slug.attribute'),
            'thumbnail' => trans('posts.form_control.input.thumbnail.attribute'),
            'description' => trans('posts.form_control.textarea.description.attribute'),
            'content' => trans('posts.form_control.textarea.content.attribute'),
            'category' => trans('posts.form_control.input.category.attribute'),
            'tag' => trans('posts.form_control.select.tag.attribute'),
            'status' => trans('posts.form_control.select.status.attribute')
        ];
    }
}
