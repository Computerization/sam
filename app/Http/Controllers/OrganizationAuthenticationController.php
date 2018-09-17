<?php

namespace App\Http\Controllers;

use App\Organization;
use App\OrganizationAuthentication;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrgAuth;

class OrganizationAuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $auths = Organization::findOrFail($id)->authentication->all();
        // dd($auths);
        return response()->json($auths);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('org.auth.create', ['org_id' => $id]);
    }

    /**
     * Store a newly created or updated resource in storage.
     * Depending on whether there's a 'id' in request
     * @param  \App\Http\Requests\StoreOrgAuth  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrgAuth $request, $id)
    {
        //
        $auth = $request->all();
        // dd($auth);
        $auth['organization_id'] = $id;
        if(!isset($auth['id'])){
          OrganizationAuthentication::create($auth);
        }else{
          OrganizationAuthentication::findOrFail($auth['id'])->update($auth);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrganizationAuthentication  $organizationAuthentication
     * @return \Illuminate\Http\Response
     */
    public function show($orgid, $authid)
    {
        //
        $auth = Organization::findOrFail($orgid)->authentication()->findOrFail($authid);
        return response()->json($auth);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrganizationAuthentication  $organizationAuthentication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $orgid)
    {
        //
        $auth = Organization::findOrFail($orgid)->authentication()->findOrFail($request->authentication_id);
        // dd($auth->members->count());
        if($auth->members->count() > 0){
          return response()->json(['status' => 0]);
        }else{
          $auth->delete();
          // return response()->json(['status' => 1]);
        }
        return back();
    }
}
