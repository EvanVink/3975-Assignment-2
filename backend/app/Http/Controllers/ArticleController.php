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
    public function index() {
    try {
        $articles = Article::all();
        return response()->json($articles);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        // Set Vancouver timezone and current date
        date_default_timezone_set('America/Vancouver');
        $currentDate = date('Y-m-d');
        
        return view('users.createArticle', [
            'currentDate' => $currentDate
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);
    
        // Get the next ArticleId
        $maxId = Article::max('ArticleId') ?? 0;
        $nextId = $maxId + 1;
    
        Article::create([
            'ArticleId' => $nextId,
            'Title' => $request->title,
            'Body' => $request->body,
            'CreateDate' => date('Y-m-d'),
            'StartDate' => $request->startDate,
            'EndDate' => $request->endDate,
            'ContributorUsername' => Auth::user()->Username  // Changed from session('userName')
        ]);
    
        return redirect('/profile')->with('success', 'Article created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show($ArticleId)
    {

        try {
            $article = Article::find($ArticleId);
            return response()->json($article);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
        $request->validate([
            'Title' => 'required',
            'Body' => 'required',
            'CreateDate' => 'required|date',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date',
            'ContributorUsername' => 'required'
        ]);



        $article->update($request->all());
        return redirect("/profile")->with('success', 'Article updated successfully.');
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
