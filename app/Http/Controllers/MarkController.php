<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MarkController extends Controller
{
    private $perPage = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = $request->get('keyword') ? Mark::search($request->keyword)->paginate($this->perPage)
        : Mark::paginate($this->perPage);
        return view('dashboard.shops.mark.index',[
            'tags' => $tags->appends(['keyword' => $request->keyword])
        ]);
    }

    public function select(Request $request)
    {
        $tags = [];
        if ($request->has('q')) {
            $tags = Mark::select('id','title')->search($request->q)->get();
        } else {
            $tags = Mark::select('id','title')->limit(5)->get();
        }

        return response()->json($tags);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.shops.mark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            [
            'title' => 'required|string|max:25',
            'slug' => 'required|string|unique:tags,slug'
            ],
            [],
            $this->getAttributes()
        )->validate();

        try {
            Mark::create([
                'title' => $request->title,
                'slug' => $request->slug
            ]);
            Alert::success(
                trans('tags.alert.create.title'),
                trans('tags.alert.create.message.success')
            );
            return redirect()->route('mark.index');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error(
                trans('tags.alert.create.title'),
                trans('tags.alert.create.message.error',['error' => $th->getMessage()]),
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        return view('dashboard.shops.mark.edit',compact('mark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        Validator::make(
            $request->all(),
            [
            'title' => 'required|string|max:25',
            'slug' => 'required|string|unique:tags,slug,' . $mark->id
            ],
            [],
            $this->getAttributes()
        )->validate();

        try {
            $mark->update([
                'title' => $request->title,
                'slug' => $request->slug
            ]);
            Alert::success(
                trans('tags.alert.update.title'),
                trans('tags.alert.update.message.success')
            );
            return redirect()->route('mark.index');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error(
                trans('tags.alert.update.title'),
                trans('tags.alert.update.message.error',['error' => $th->getMessage()]),
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        try {
            $mark->delete();
            Alert::success(
                trans('tags.alert.delete.title'),
                trans('tags.alert.delete.message.success')
            );
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error(
                trans('tags.alert.delete.title'),
                trans('tags.alert.delete.message.error',['error' => $th->getMessage()]),
            );
        }
        return redirect()->back();
    }

    private function getAttributes()
    {
        return [
            'title' => trans('tags.form_control.input.title.attribute'),
            'slug' => trans('tags.form_control.input.slug.attribute'),
        ];
    }
}
