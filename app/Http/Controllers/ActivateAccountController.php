<?php

namespace App\Http\Controllers;

use App\User;
use App\ActivationCode;
use Illuminate\Http\Request;

class ActivateAccountController extends Controller
{
    //
    public function index(){
        if(!session("user_id")){
            dd("invalid Request");
        }
        return view('activate.index');
    }

    public function verify(Request $request){
        if(!session("user_id")){
            dd("invalid Request");
        }
        $code = ActivationCode::where("code", $request->code);
        $code_one = $code->first();
        if($code->count()>0 && $code_one->is_used == 0){
            $user = User::findOrFail(session("user_id"));
            $user->group = 0;
            $user->save();
            $code->user_id = session("user_id");
            $code_one->is_used = 1;
            $code_one->save();
            session(["user_id" => null]);
            return redirect('/login')->with(["reset"=>1]);
        }else{
            return redirect('/activate')->with(["reset"=>2]);
        }
    }
}
