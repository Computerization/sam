<?php

namespace App\Http\Controllers;

use Validator;
use Image;
use Illuminate\Http\Response;
use App\File;
use App\User;
use App\Organization;
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
      $id = $this->process_image($request);
      return back()->with(['status' => 1]);
      // return response()->json([
      //     'success' => true,
      //     'file_path' => $id,
      // ], 200);
    }

    public function post_org_avatar(Request $request){
      $validator = Validator::make($request->all(), File::$image_rules, File::$messages);
      if($validator->fails()){
        return back()->with(['fail' => 1,'error'=>$validator->messages()->first()]);
      }
      $org = Organization::findOrFail($request->id);
      if($org -> user -> id != Auth::id()){
        return back()->with(['fail' => 1,'error'=>'Access Denied.']);
      }
      $id = $this->process_image($request);
      $org -> file_id =  $id;
      $org -> save();
      return back()->with(['status' => 1]);
    }

    public function post_image(Request $request){
      $validator = Validator::make($request->all(), File::$image_rules, File::$messages);
      if($validator->fails()){
        return response()->json([
            'success' => false,
            'msg' => $validator->messages()->first(),
        ], 200);
      }
      $id = $this->process_image($request);
      return response()->json([
          'success' => true,
          'file_path' => '/image/'.$id,
      ], 200);
    }

    public function get_image($id){
      $file = File::findOrFail($id);
      return response()->file(base_path('storage/app/images_small/').$file->filename.'.jpg');
    }

    public function get_original_image($id){
      $file = File::findOrFail($id);
      return response()->file(base_path('storage/app/images/').$file->filename);
    }

    public function process_image(Request $request){
      $file = $request->file;
      $filename_raw = Carbon::now()->timestamp.'_'.mt_rand(100, 999).'_'.Auth::id();
      $filename = $filename_raw.'.'.$file->getClientOriginalExtension();
      // original image
      $path = $request->file->storeAs('images', $filename);
      // compressed image
      $image = Image::make($request->file)->resize(1080, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save('../storage/app/images_small/'.$filename.'.jpg', 90);
      $fileinfo = new File;
      $fileinfo -> original_name = $file->getClientOriginalName();
      $fileinfo -> filename = $filename;
      $fileinfo -> type = $request->type;
      $fileinfo -> user_id = Auth::id();
      $fileinfo -> save();
      return $fileinfo->id;
    }
}
