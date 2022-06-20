<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Mark;
use Laravel\Ui\Presets\React;

class ProductController extends Controller
{
    private $perPage = 10;
    public function index()
    {
        return view('frontend.shops.index',[
            'kategori' => Kategori::with('descendants')->onlyParent()->get(),
            'shops' => Shop::publish()->latest()->paginate($this->perPage),
            'users' => User::get()->all(),
        ]);
    }

    public function showCategories()
    {
        return view('blog.categories',[
            'categories' => Kategori::onlyParent()->paginate($this->perPage)
        ]);
    }

    public function showTags()
    {
        return view('blog.tags',[
            'tags' => Mark::paginate($this->perPage)
        ]);
    }

    public function searchPosts(Request $request)
    {
        if (!$request->get('keyword')) {
            return redirect()->route('blog.home');
        }
        return view('blog.search-post',[
            'posts' => Shop::search($request->keyword)->paginate($this->perPage)->appends(['keyword' => $request->keyword])
        ]);
    }

    public function showPostsByCategory($slug)
    {
        $posts = Shop::publish()->whereHas('categories', function($query) use ($slug){
            return $query->where('slug',$slug);
        })->paginate($this->perPage);

        $category = Kategori::where('slug',$slug)->first();
        $categoryRoot = $category->root();

        return view('blog.posts-category',[
            'posts' => $posts,
            'category' => $category,
            'categoryRoot' => $categoryRoot
        ]);
    }

    public function showPostsByTag($slug)
    {
        $posts = Shop::publish()->whereHas('tags', function($query) use ($slug){
            return $query->where('slug',$slug);
        })->paginate($this->perPage);

        $tag = Mark::where('slug',$slug)->first();
        $tags = Mark::search($tag->title)->get();
        return view('blog.posts-tag',[
            'posts' => $posts,
            'tag' => $tag,
            'tags' => $tags
        ]);
    }

    public function showProductDetail($slug)
    {
        $product = Shop::publish()->with(['kategori','mark'])->where('slug',$slug)->first();
        if (!$product) {
            return redirect()->route('shops.index');
        }
        return view('frontend.shops.detail',[
            'produk' => $product
        ]);
    }
}
