<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/localization/{language}',[\App\Http\Controllers\LocalizationController::class, 'switch'])->name('localization.switch');

Route::get('/', [\App\Http\Controllers\BlogController::class, 'home'])->name('blog.home');
Route::get('/gheptech', [\App\Http\Controllers\GheptechController::class, 'home'])->name('gheptech.home');

Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/product/{slug}', [\App\Http\Controllers\ProductController::class, 'showProductDetail'])->name('product.detail');
//Tutorial
Route::get('/tutorial', [\App\Http\Controllers\TutorialController::class, 'index'])->name('tutorial.index');
Route::get('/tutorial/{tutorial:slug}', [\App\Http\Controllers\TutorialController::class, 'show']);

Route::get('/categories', [\App\Http\Controllers\BlogController::class, 'showCategories'])->name('blog.categories');
Route::get('/tags', [\App\Http\Controllers\BlogController::class, 'showTags'])->name('blog.tags');
Route::get('/search', [\App\Http\Controllers\BlogController::class, 'searchPosts'])->name('blog.search');
Route::get('/categories/{slug}', [\App\Http\Controllers\BlogController::class, 'showPostsByCategory'])->name('blog.posts.category');
Route::get('/tags/{slug}', [\App\Http\Controllers\BlogController::class, 'showPostsByTag'])->name('blog.posts.tag');
Route::get('/post/{slug}', [\App\Http\Controllers\BlogController::class, 'showPostDetail'])->name('blog.posts.detail');

Auth::routes([
    'register' => false
]);

Route::group(['prefix' => 'dashboard','middleware' => ['web','auth']],function(){
    // Dashboard
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

    //Kategori
    Route::get('/kategori/select',[\App\Http\Controllers\KategoriController::class, 'select'])->name('kategori.select');
    Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);
    //Mark
    Route::get('/mark/select',[\App\Http\Controllers\MarkController::class, 'select'])->name('mark.select');
    Route::resource('/mark', \App\Http\Controllers\MarkController::class)->except(['show']);
    //Shops
    Route::resource('/shops', \App\Http\Controllers\ShopController::class);
    







    // Categories
    Route::get('/categories/select',[\App\Http\Controllers\CategoryController::class, 'select'])->name('categories.select');
    Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
    //Tags
    Route::get('/tags/select',[\App\Http\Controllers\TagController::class, 'select'])->name('tags.select');
    Route::resource('/tags', \App\Http\Controllers\TagController::class)->except(['show']);
    //Posts
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    //file manager
    Route::group(['prefix' => 'filemanager'], function () {
        Route::get('/index',[\App\Http\Controllers\FileManagerController::class,'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    //Roles
    Route::get('/roles/select',[\App\Http\Controllers\RoleController::class, 'select'])->name('roles.select');
    Route::resource('/roles', \App\Http\Controllers\RoleController::class);
    //Users
    Route::resource('/users', \App\Http\Controllers\UserController::class)->except(['show']);
});
