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

        return redirect()->action('VoteController@stat',['id'=>$vote->id])->with('status', 'Vote Created Successfully.');
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
            'question.*.question_content' => 'max:255',
        ]);

        $vote = Vote::find($id);
        if ($vote->user_id != Auth::id()) {
          return redirect('vote')->with('status', 'Permission Denied');
        }

        $vote->vote_name = $request->vote_name;
        $vote->save();
        if(!isset($request->question)){
          return redirect()->action('VoteController@edit',['id'=>$vote->id])->with('status', 'Question Cannot be null.');
        }

        foreach ($request->question as $question) {
          if (isset($question['id'])) {
            $q = Question::find($question['id']);
            $q->question_content = $question['question_content'];
            $q->save();
          }elseif (isset($question['question_content'])){
            $q = new Question(['question_content' => $question['question_content']]);
            $v = Vote::find($id);
            $v->questions()->save($q);
          }
        }
        return redirect()->action('VoteController@stat',['id'=>$vote->id])->with('status', 'Vote Modified Successfully.');
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

            $vote = Vote::find($id);
            if ($vote->user_id != Auth::id()) {
              return redirect('vote')->with('status', 'Permission Denied');
            }

            $questions = Vote::find($id)->questions()->get();
            $q_id = array();
            $ans_id = array();

            // dd($questions);

            if(isset($questions)){
              foreach ($questions as $question) {
                array_push($q_id, $question->id);
                $answers = Question::find($question->id)->answers()->get();
                if (isset($answers)) {
                  foreach ($answers as $answer) {
                    array_push($ans_id, $answer->id);
                  }
                }

              }
            }

            Answer::destroy($ans_id);

            return redirect('/vote')->with('status', 'Responses Cleared Successfully.');
    }

    public function destroy($id)
    {

      $vote = Vote::find($id);
      if ($vote->user_id != Auth::id()) {
        return redirect('vote')->with('status', 'Permission Denied');
      }

      $questions = Vote::find($id)->questions()->get();
      $q_id = array();
      $ans_id = array();

      // dd($questions);

      if(isset($questions)){
        foreach ($questions as $question) {
          array_push($q_id, $question->id);
          $answers = Question::find($question->id)->answers()->get();
          if (isset($answers)) {
            foreach ($answers as $answer) {
              array_push($ans_id, $answer->id);
            }
          }

        }
      }

      Answer::destroy($ans_id);
      Question::destroy($q_id);
      Vote::destroy($id);
      return redirect('/vote')->with('status', 'Vote Deleted Successfully.');
    }

}
