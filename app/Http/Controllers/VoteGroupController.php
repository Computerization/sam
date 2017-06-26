<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vote;
use App\VoteGroup;

class VoteGroupController extends Controller
{
    public function index()
    {
        //
        $vote_groups = VoteGroup::all();
        return view('votegroups.index',['vote_groups' => $vote_groups]);
    }

    public function create()
    {
        //
        return view('votegroups.create',['type' => 0]);
    }

    public function store(Request $request)
    {
        //
        // dd($request->all());
        $this->validate($request,[
          'group_name' => 'required|max:255',
        ]);

        $vote_data['group_name'] = $request->group_name;
        $vote_data['user_id'] = Auth::id();
        $vote = VoteGroup::create($vote_data);
        return redirect()->action('VoteGroupController@selectvote',$vote->id)->with('status', 'Vote Group Created Successfully.');
    }

    public function show($id)
    {
        //
        $vote_group = VoteGroup::find($id);
        return view('votegroups.show',['vote_group'=>$vote_group]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function selectvote($id)
    {
      // dd(Vote::find(1)->has('vote_groups'));
      $votes = Vote::all();
      return view('votes.index',['votes'=>$votes,'group_id'=>$id]);
    }

    public function addvote(Request $request, $id)
    {
        //
        $vote = Vote::find($request->vote_id);
        $vote->vote_groups()->attach($id);
        return redirect()->action('VoteGroupController@selectvote',$id)->with('status', 'Vote Added Successfully.');
    }


    public function rmvote(Request $request, $id)
    {
        //
        $vote = Vote::find($request->vote_id);
        $vote->vote_groups()->detach($id);
        return redirect()->action('VoteGroupController@selectvote',$id)->with('status', 'Vote Removed Successfully.');
    }

    public function destroy($id)
    {
        //
        $vote_group = VoteGroup::find($id);
        $votes = $vote_group->votes->all();
        foreach ($votes as $vote) {
          $vote_group->votes()->detach($vote['id']);
        }
        VoteGroup::destroy($id);
        return redirect()->action('VoteGroupController@index')->with('status', 'Vote Group Removed Successfully.');
    }
}
