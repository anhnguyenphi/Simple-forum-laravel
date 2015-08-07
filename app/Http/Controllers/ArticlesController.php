<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model
use App\Article;
use App\Tag;

use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleFormRequest;
class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::with('tag')->paginate(5);
        return view('articles.index', compact('articles'));
    }
    // show a article
    public function show($id) {
        $article = Article::find($id);  
        return view('articles.show',compact('article'));
    }
    // return view create article
    public function create() {
    	return view('articles.create');
    }
    // store article after create
    public function store(ArticleFormRequest $request) {
        // create article
        $article = Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);    
        // check tag if it exist
        $tagInput = strtoupper($request->input('tag'));
        $tag = Tag::where('tag','=',$tagInput)->first();
        if (empty($tag)) {
            $tag = Tag::create([
                'tag' => $tagInput
            ]);
        }
        $article->tag()->attach($tag->id);
    	return redirect()->route('articles.index');
    }
    // return view edit article
    public function edit($id) {
        $article = Article::find($id);
    	return view('articles.edit', compact('article'));
    }
    // update articles after edit
    public function update($id, ArticleFormRequest $request) {
        // update Article
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->save();
        // update Tag
        $newTag = $request->input('tag');
        // check same tag
        $oldTag = $article->tag->first();
        if ($newTag != $oldTag->tag) {
            // remove old relation with old tag
            $article->tag()->detach($oldTag->id);
            // Check if new tag exist
            $checkTag = Tag::where('tag','=', $newTag)->first();
            if (empty($checkTag)) {
                $newTag = Tag::create([
                    'tag' => $newTag
                ]);
                $article->tag()->attach($newTag->id);
            } else {
                $article->tag()->attach($checkTag->id);
            }
        }
		return redirect()->route('articles.index');
    }
    // delete a articles
    public function destroy($id) {
        $article = Article::find($id);
        $article->delete();
		return redirect()->route('articles.index');
	}
}
