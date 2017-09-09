<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Response;
use App\File;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function post_avatar(Request $request){
      // avators -> 1
      // images -> 2
      // files -> 3

      $validator = Validator::make($request->all(), File::$image_rules, File::$messages);

      if($validator->fails()){
        return back()->with(['fail' => 1,'error'=>$validator->messages()->first()]);
        // return response()->json([
        //     'success' => false,
        //     'msg' => $validator->messages()->first(),
        // ], 200);
      }

      $avatar = User::findOrFail(Auth::id())->files->where('type',1)->first();
      if($avatar){
        $avatar -> type = 2;
        $avatar -> save();
      }

      $id = $this->process_file($request);

      return back()->with(['status' => 1]);

      // return response()->json([
      //     'success' => true,
      //     'file_path' => $id,
      // ], 200);

    }

    public function post_image(Request $request){
      // avators -> 1
      // images -> 2
      // files -> 3

      $validator = Validator::make($request->all(), File::$image_rules, File::$messages);

      if($validator->fails()){
        return response()->json([
            'success' => false,
            'msg' => $validator->messages()->first(),
        ], 200);
      }

      $id = $this->process_file($request);

      return response()->json([
          'success' => true,
          'file_path' => '/image/'.$id,
      ], 200);

    }

    public function get_image($id){
      $file = File::findOrFail($id);
      return response()->file(base_path('storage/app/images/').$file->filename);
    }


    public function process_file(Request $request){
      // dd($data);
      $file = $request->file;
      $filename = Carbon::now()->timestamp.'_'.mt_rand(100, 999).'_'.Auth::id().'.'.$file->getClientOriginalExtension();

      $path = $request->file->storeAs('images', $filename);

      $fileinfo = new File;
      $fileinfo -> original_name = $file->getClientOriginalName();
      $fileinfo -> filename = $filename;
      $fileinfo -> type = $request->type;
      $fileinfo -> user_id = Auth::id();
      $fileinfo -> save();

      return $fileinfo->id;
    }
}
