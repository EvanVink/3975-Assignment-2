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
        return Article::all();
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'ArticleId' => 'required',
            'Title' => 'required',
            'Body' => 'required',
            'CreateDate' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required',
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
        return Article::find($ArticleId);
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
