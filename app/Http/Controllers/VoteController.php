<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vote;
use App\Question;
use App\Answer;

class VoteController extends Controller
{

    public function index()
    {
        $votes = Vote::all();
        return view('votes.index',['votes'=>$votes]);
    }

    public function create()
    {
        //
        // 0 for create and 1 for update
        return view('votes.create',['type' => 0]);
    }

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

    public function show($id)
    {
        $vote = Vote::find($id);
        return view('votes.vote',['vote'=>$vote]);
    }

    public function stat($id)
    {
        $vote = Vote::find($id);
        $questions = Vote::find($id)->questions;
        return view('votes.stat',['vote'=>$vote,'questions'=>$questions]);
    }

    public function edit($id)
    {
        //
        $vote = Vote::find($id);
        return view('votes.create',['type' => 1, 'vote' => $vote]);
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'vote_name' => 'required|max:255',
            'question.*.question_content' => 'required|max:255',
            'question.*.id' => 'required|max:255',
        ]);

        $vote = Vote::find($id);
        if ($vote->user_id != Auth::id()) {
          return redirect('vote')->with('status', 'Permission Denied');
        }
        $vote->vote_name = $request->vote_name;
        $vote->save();

        $question_data = $request->question;
        foreach ($request->question as $key => $question) {
          $q = Question::find($question_data[$key]['id']);
          if ($id == $q->vote_id) {
            $q->question_content = $question_data[$key]['question_content'];
          }
          $q->save();
        }

        return redirect('vote')->with('status', 'Vote Modified Successfully.');
    }


    public function submit(Request $request, $id)
    {
      $this->validate($request, [
          'answer.*.answer_content' => 'required|max:255',
      ]);
      $data = $request->answer;
      // dd($data);
      foreach ($request->answer as $key => $value) {
        Answer::updateOrCreate(['user_id' => Auth::id(), 'question_id' => $data[$key]['question_id']], ['answer_content' => $data[$key]['answer_content']]);
      }
      return redirect('vote')->with('status', 'Response Submitted Successfully.');
    }

    public function clearResponse($id)
    {
        //
        return "Clear Response";
    }

    public function destroy($id)
    {
        //
        return "Delete";
    }

}
