<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   // In ArticleController.php
    public function index()
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Fetch articles where ContributorUsername matches the logged-in user's username
        $articles = Article::where('ContributorUsername', $user->Username)->get();

        //passing the user and the articles to the view
        return view('users.index', ['articles' => $articles, 'user' => $user]);
    }


    // $articles = Article::all();  // Fetch all articles from the database
    // return view('index', compact('articles'));  // Pass articles to the Blade view


    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     request()->validate([
    //         'ArticleId' => 'required',
    //         'Title' => 'required',
    //         'Body' => 'required',
    //         'CreateDate' => 'required',
    //         'StartDate' => 'required',
    //         'EndDate' => 'required',
    //         'ContributorUsername' => 'required'
    //     ]);

    //     Article::create([
    //         'ArticleId' => request('ArticleId'),
    //         'Title' => request('Title'),
    //         'Body' => request('Body'),
    //         'CreateDate' => request('CreateDate'),
    //         'StartDate' => request('StartDate'),
    //         'EndDate' => request('EndDate'),
    //         'ContributorUsername' => request('ContributorUsername')


    //     ]);


    // }
    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Body' => 'required',
            'CreateDate' => 'required|date',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date',
            'ContributorUsername' => 'required'
        ]);

        Article::create([
            'ArticleId' => request('ArticleId'),
            'Title' => request('Title'),
            'Body' => request('Body'),
            'CreateDate' => request('CreateDate'),
            'StartDate' => request('StartDate'),
            'EndDate' => request('EndDate'),
            'ContributorUsername' => request('ContributorUsername')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($ArticleId)
    {

        $article = Article::where('ArticleId', $ArticleId)
        //this join line helps pass the contribuotr's first and last name to the article
            ->join('Users', 'Article.ContributorUsername', '=', 'Users.Username')
            ->select('Article.Title', 'Article.Body', 'Article.StartDate', 'Users.FirstName', 'Users.LastName')
            ->first();
        
        if (!$article) {
            abort(404, 'Article not found');
        }
    
        return view('users.showArticle', compact('article'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('users.edit_article', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect("/profile")->with('success', 'Article deleted successfully.');
    }
}
