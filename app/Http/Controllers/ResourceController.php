<?php

namespace App\Http\Controllers;

use Validator;
use App\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    public function index()
    {
        //
        $resources = Resource::all();
        return view('reservation.index', ['resources' => $resources]);
    }

    public function create()
    {
        //
        return view('reservation.create');
    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), Resource::$rules, Resource::$messages);
        if($validator->fails()){
          return back()->with(['fail' => 1,'errors'=>$validator->messages()]);
        }
        $input = $request->only('name', 'description');
        $resource = Auth::user()->resources()->create($input);
        return redirect()->action('ResourceController@index');
    }

    public function show(Resource $resource)
    {
        //
        return view('reservation.show', ['resource' => $resource]);
    }

    public function edit(Resource $resource)
    {
        //
        return view('reservation.edit', ['resource' => $resource]);
    }

    public function update(Request $request, Resource $resource)
    {
        //
        $validator = Validator::make($request->all(), Resource::$rules, Resource::$messages);
        if($validator->fails()){
          return back()->with(['fail' => 1,'error'=>$validator->messages()->first()]);
        }
        $input = $request->only('name', 'description');
        $result = $resource->fill($input)->save();
        return redirect()->action('ResourceController@index');
    }

    public function destroy(Resource $resource)
    {
        //
        $result = $resource->delete();
        return redirect()->action('ResourceController@index');
    }
}
