<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\User;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    //
    public function index() {
      $organizations = Organization::all();
      return view('org.index', ['orgs' => $organizations]);
    }

    public function show($id) {
      $organization = Organization::findOrFail($id);
      return view('org.show', ['org' => $organization]);
    }

    public function join(Request $request) {
      if(Auth::check()){
        $resume = User::find(Auth::id())->resume()->first();
        if($resume){
          $resume->orgs()->attach($request->id);
          return redirect()->action('OrganizationController@show', ['id' => $request->id])->with(['msg'=>'Welcome']);
        }else{
          $request->session()->put('resume_to_org',$request->id);
          return redirect()->action('ResumeController@index');
        }
      }else{
        $request->session()->put('resume_to_org',$request->id);
        return redirect()->action('ResumeController@index');
      }

    }

    public function show_resumes($id) {
      $resumes = Organization::findOrFail($id)->resumes->all();
      // dd($resumes);
      return view('org.show_resume', ['resumes' => $resumes]);
    }

}
