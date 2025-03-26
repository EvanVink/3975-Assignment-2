<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json($articles)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization');
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
        $article = Article::find($ArticleId);

        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization');
        }

        return response()->json($article)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
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
    public function destroy(Article $article)
    {
        //
    }
}
