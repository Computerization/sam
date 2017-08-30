<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
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
        $request->session()->put('resume_to_org',$request->id);
        return redirect()->action('ResumeController@index');
    }

    public function show_resumes($id) {
      $resumes = Organization::findOrFail($id)->resumes->all();
      // dd($resumes);
      return view('org.show_resume', ['resumes' => $resumes]);
    }

}
