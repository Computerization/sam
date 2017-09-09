<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    public static $image_rules = [
        'file' => 'required|mimes:png,gif,jpeg,jpg,bmp|max:1024'
    ];

    public static $file_rules = [
        'file' => 'required|mimes:doc,docx,ppt,pptx,xls,xlsx,csv,txt,pdf,7z,rar,zip|max:1048576'
    ];

    public static $messages = [
        'file.mimes' => '文件类型不符合',
        'file.required' => '文件不能为空',
        'file.max' => '文件超出允许大小',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
}
