<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vote;
use App\Answer;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $votes = Vote::all();
        return view('votes.index',['votes'=>$votes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $vote = Vote::find($id);
        $questions = Vote::find($id)->questions;
        return view('votes.vote',['vote'=>$vote,'questions'=>$questions]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stat($id)
    {
        // dd($id);
        $vote = Vote::find($id);
        $questions = Vote::find($id)->questions;
        return view('votes.stat',['vote'=>$vote,'questions'=>$questions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function submit(Request $request, $id)
    {
      $this->validate($request, [
          'answer.*.answer_content' => 'required|max:255',
      ]);
      $data = $request->answer;
      foreach ($request->answer as $key => $value) {
        $data[$key]['user_id'] = Auth::id();
      }
      Answer::insert($data);
      return redirect('vote')->with('status', 'Response Submitted Successfully.');
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
}
