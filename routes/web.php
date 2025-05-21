<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/', 'BookDetailsController@index');

$router->get('/author', 'AuthorController@index');
$router->get('/author/new', 'AuthorController@create');
$router->post('/author', 'AuthorController@store');
$router->get('/author/{id}/edit', 'AuthorController@edit');
$router->put('/author/{id}', 'AuthorController@update');

$router->get('/author', function () {
    $authors = \App\Models\Author::all();
    return new \Illuminate\Http\Response(
        view('author.index', compact('authors'))->render(),
        200
    );
});

$router->get('/author/{id}/edit', function ($id) {
    $author = \App\Models\Author::findOrFail($id);
    return view('author.create', compact('author'));
});

$router->get('/author/new', function () use ($router) {
    return view('author.create');
});

$router->get('/subject', 'SubjectController@index');
$router->get('/subject/new', 'SubjectController@create');
$router->post('/subject', 'SubjectController@store');
$router->get('/subject/{id}/edit', 'SubjectController@edit');
$router->put('/subject/{id}', 'SubjectController@update');

$router->get('/subject', function () {
    $subjects = \App\Models\Subject::all();
    return new \Illuminate\Http\Response(
        view('subject.index', compact('subjects'))->render(),
        200
    );
});

$router->get('/subject/new', function () use ($router) {
    return view('subject.create');
});

$router->get('/subject/{id}/edit', function ($id) {
    $subject = \App\Models\Subject::findOrFail($id);
    return view('subject.create', compact('subject'));
});

$router->get('/book', 'BookController@index');
$router->get('/book/new', 'BookController@create');
$router->post('/book', 'BookController@store');
$router->get('/book/{id}/edit', 'BookController@edit');
$router->put('/book/{id}', 'BookController@update');

$router->get('/book', function () use ($router) {
    $books = \App\Models\Book::all();
    return new \Illuminate\Http\Response(
        view('book.index', compact('books'))->render(),
        200
    );
});

$router->get('/book/new', function () use ($router) {
    $authors = \App\Models\Author::all()->where('status', true);
    $subjects = \App\Models\Subject::all()->where('status', true);
    return view('book.create', compact('authors', 'subjects'));
});

$router->get('/book/{id}/edit', function ($id) {
    $book = \App\Models\Book::findOrFail($id);
    $authors = \App\Models\Author::all()->where('status', true);
    $subjects = \App\Models\Subject::all()->where('status', true);
    return view('book.create', compact('book', 'authors', 'subjects'));
});

$router->get('/download/book-details', 'BookDetailsController@exportPDF');
