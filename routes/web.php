<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Nilam",
        "job" => "Dukun Web",
        "image" => "nilam.jpg"
    ]);
});


Route::get('/posts', [PostController::class, 'index']);

// halaman single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);



Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "Post By Category : $category->name",
        'posts' => $category->posts->load('category', 'author')
    ]);
});
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'title' => "Post By Author : $author->name",
        'posts' => $author->posts->load('category', 'author')
    ]);
});
