<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Http\Requests\ArticleFormRequest;
class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('id','desc')->paginate(5);
        return view('articles.index', compact('articles'));
    }

    public function show($id) {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
    }

    public function create() {
    	return view('articles.create');
    }

    public function store(ArticleFormRequest $request) {
    	$title = $request->input('title');
    	$content = $request->input('content');
    	Article::create([
    		'title' => $title,
    		'content' => $content
    	]);
    	return redirect()->route('articles.index');
    }

    public function edit($id) {
    	$article = Article::find($id);
    	return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleFormRequest $request) {
		$article = Article::find($id);
		$article->title = $request->input('title');
		$article->content = $request->input('content');
		$article->save();
		return redirect()->route('articles.index');
    }

    public function destroy($id) {
		$article = Article::find($id);
		$article->delete();
		return redirect()->route('articles.index');
	}
}
