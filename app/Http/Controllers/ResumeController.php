<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resume;

class ResumeController extends Controller
{
    //
    public function index(){
      return view('resume.index');
    }

    public function save(Request $request){

      $this->validate($request, [
          'email' => 'required|max:255',
      ]);

      $resume = Resume::where('email', $request->email)->first();
      // dd($resume);
      if(!$resume){

        $this->validate($request, [
            'name' => 'required|max:255',
            'contact' => 'required|max:255',
            'student_number' => 'required|max:255',
            'additional_info' => 'required|max:255',
        ]);

        $resume = new Resume;
        $resume->email = $request->email;
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
    }

    public function show($id){
      $resume = Resume::findOrFail($id);
      return view('resume.show', ['resume' => $resume]);
    }

}
