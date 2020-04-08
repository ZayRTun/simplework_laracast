<?php

use App\Article;
use Illuminate\Support\Facades\Route;

app()->bind('example', function () {
    return new \App\Example();
});

Route::get('/', function () {
    $example = resolve('example');

    ddd($example);
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/about', function () {
    $articles = Article::latest()->paginate(3);
    return view('about', compact('articles'));
});

Route::get('/articles', 'ArticleController@index')->name('articles.index');
Route::post('/articles', 'ArticleController@store');
Route::get('/articles/create', 'ArticleController@create');
Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticleController@edit');
Route::put('/articles/{article}', 'ArticleController@update');
