<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComment;
use App\Http\Requests\StoreCommentAttitude;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        //
        $comment = $request->all();
        // dd($comment);
        $comment['user_id'] = Auth::id();
        if(!isset($comment['id'])){
          Comment::create($comment);
        }else{
          Comment::findOrFail($comment['id'])->update($comment);
        }
        return back();
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

    public function attitude(StoreCommentAttitude $request){
      $cid = $request->comment_id;
      // return $cid;
      $attitude = Auth::user()->comment_attitude();
      if($attitude->find($cid) == null){
        $attitude->attach($cid, ['action_primary_type' => config('organization.content_stat.ATTITUDE')]);
      }
      $attitude_pivot = $attitude->find($cid)->pivot;
      if($attitude_pivot->action_secondary_type == $request->action_secondary_type){
        $attitude->detach($cid);
      }else{
        $attitude_request['action_secondary_type'] = $request->action_secondary_type;
        $attitude_pivot->update($attitude_request);
      }
      $comment = Comment::findOrFail($cid);
      $comment->upvote = $comment->get_upvote()->count();
      $comment->downvote = $comment->get_downvote()->count();
      $comment->save();
      return back();
      return response()->json(['status' => 1]);
    }

    public function star($id){
      $star = Auth::user()->comment_star();
      if($star->find($id) == null){
        $star->attach($id, ['action_primary_type' => config('organization.content_stat.STAR')]);
      }else{
        $star->detach($id);
      }
      return response()->json(['status' => 1]);
    }

}
