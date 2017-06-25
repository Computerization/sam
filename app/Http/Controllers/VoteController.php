<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vote;
use App\Question;
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
        // return "create";
        return view('votes.create');
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
        $this->validate($request, [
            'vote_name' => 'required|max:255',
            'question.*.question_content' => 'required|max:255',
        ]);

        $vote_data['vote_name'] = $request->vote_name;
        $vote_data['user_id'] = Auth::id();
        $vote = Vote::create($vote_data);

        $question_data = $request->question;
        foreach ($request->question as $key => $value) {
          $question_data[$key]['vote_id'] = $vote->id;
        }
        $quesiton = $vote->questions()->createMany($question_data);

        return redirect('vote')->with('status', 'Vote Created Successfully.');
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
      // dd($id);
      foreach ($request->answer as $key => $value) {
        $data[$key]['user_id'] = Auth::id();
        $data[$key]['question_id'] = $id;
      }
      // dd($data);
      $answer = Question::find($id)->answers()->createMany($data);
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
