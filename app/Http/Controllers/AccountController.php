<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AccountController extends Controller
{
    //
    public function profile_edit_show(){
      return view('account.profile_edit', ['user' => Auth::user()]);
    }

    public function profile_edit_store(Request $request){
      // dd($request->all());
      $this->validate($request, [
          'name' => 'required|max:255',
      ]);
      $user = User::find(Auth::id());
      $user->name = $request->name;
      $user->save();
      return redirect()->action('AccountController@profile_edit_show')->with(['status'=>1]);
    }

}
