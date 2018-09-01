<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use App\Organization;
use App\Http\Requests\StoreArticle;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAttitude;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();
        return response()->json($articles);
    }

    public function create(){
      return view('article.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        //
        $articles = Article::all();
        return view('article.test', ['articles' => $articles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
        //
        $article = $request->all();
        // dd($article);
        $article['user_id'] = Auth::id();
        if(!isset($article['id'])){
          Article::create($article);
        }else{
          Article::findOrFail($article['id'])->update($article);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::findOrFail($id);
        return view('article.show', ['article' => $article]);
    }


    public function get($id)
    {
        //
        $article = Article::findOrFail($id);
        return response()->json($article);
    }

    public function get_public_article_by_org_id($org_id){
      $article = Organization::findOrFail($org_id)->articles;
      return response()->json($article);
    }

    public function get_public_article_by_user_id($uid){
      $article = User::findOrFail($uid)->articles;
      return response()->json($article);
    }

    public function get_all_article_by_org_id($org_id){
      $article = Organization::findOrFail($org_id)->articles;
      return response()->json($article);
    }

    public function get_all_article_by_user_id($uid){
      $article = User::findOrFail($uid)->articles;
      return response()->json($article);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function attitude(StoreAttitude $request){
      $aid = $request->article_id;
      $attitude = Auth::user()->article_attitude();
      if($attitude->find($aid) == null){
        $attitude->attach($aid, ['action_primary_type' => config('organization.content_stat.ATTITUDE')]);
      }
      $attitude_pivot = $attitude->find($aid)->pivot;
      if($attitude_pivot->action_secondary_type == $request->action_secondary_type){
        $attitude->detach($aid);
      }else{
        $attitude_request['action_secondary_type'] = $request->action_secondary_type;
        $attitude_pivot->update($attitude_request);
      }
      return response()->json(['status' => 1]);
    }

    public function star($id){
      $star = Auth::user()->article_star();
      if($star->find($id) == null){
        $star->attach($id, ['action_primary_type' => config('organization.content_stat.STAR')]);
      }else{
        $star->detach($id);
      }
      return response()->json(['status' => 1]);
    }

}
