<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.home', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::all();
        return view('articles.create', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $article = new Article();

        $article->title = $request->title;
        $article->body = $request->body;
        $article->author = $request->author;
        $article->save();
        return redirect()->route('article')
            ->with('success', 'Article created successfully.'); //Redirect ke halaman books/index.blade.php dengan pesan success
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        $article = new Article();
        // $article = Article::findOrFail($article->id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->author = $request->author;
        $article->save();
        return redirect()->route('article')
            ->with('success', 'Article updated successfully.'); //Redirect ke halaman books/index.blade.php dengan pesan success
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article = Article::findOrFail($article->id);
        $article->delete();
        return redirect()->route('article')
            ->with('danger', 'Article deleted successfully.'); //Redirect ke halaman books/index.blade.php dengan pesan success
    }
}
