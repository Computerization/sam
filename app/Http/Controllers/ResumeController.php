<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resume;
use App\User;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    //
    public function index(Request $request){
      if(Auth::check()){
        $resume = User::find(Auth::id())->resume()->first();
        if ($resume) {
          return view('resume.edit', ['resume' => $resume]);
        }else{
            return view('resume.index');
          }
      }elseif($request->session()->has('resume_to_org')){
        return view('resume.index');
      }else{
        abort(403);
      }
    }

    public function save(Request $request){

      if($request->session()->has('resume_to_org')){

        $this->validate($request, [
            'email' => 'required|max:255',
        ]);

        if(Auth::check()){
            $email = Auth::user()->email;
        }else{
          $email = $request->email;
        }

        $resume = Resume::where('email', $email)->first();
        // dd($resume);
        if(!$resume){

          $this->validate($request, [
              'name' => 'required|max:255',
              'contact' => 'required|max:255',
              'student_number' => 'required|max:255',
              'additional_info' => 'required|max:255',
          ]);
          $resume = new Resume;
          $user = User::where('email', $request->email)->first();
          if(Auth::check()){
            $resume->user_id = Auth::id();
          }elseif($user){
            $resume->user_id = $user->id;
          }else {
            $resume->user_id = 0;
          }
          if(Auth::check()){
              $resume->email = Auth::user()->email;
          }else{
            $resume->email = $request->email;
          }
          $resume->name = $request->name;
          $resume->contact = $request->contact;
          $resume->student_number = $request->student_number;
          $resume->additional_info = $request->additional_info;
          $resume->save();
        }

        $org_id = $request->session()->get('resume_to_org');
        $resume->orgs()->attach($org_id);
        $request->session()->forget('resume_to_org');
        return redirect()->action('OrganizationController@show', ['id' => $org_id])->with(['msg'=>'Welcome']);

      }elseif(Auth::check()){

        $this->validate($request, [
            'name' => 'required|max:255',
            'contact' => 'required|max:255',
            'student_number' => 'required|max:255',
            'additional_info' => 'required|max:255',
        ]);

        $resume = User::find(Auth::id())->resume()->first();
        if(!$resume){
          $resume = new Resume;
          $resume->user_id = Auth::id();
          $resume->email = Auth::user()->email;
        }

        $resume->name = $request->name;
        $resume->contact = $request->contact;
        $resume->student_number = $request->student_number;
        $resume->additional_info = $request->additional_info;
        $resume->save();

        return redirect()->action('ResumeController@index')->with(['status'=> 1]);
      }else{
        abort(403);
      }
    }


}
