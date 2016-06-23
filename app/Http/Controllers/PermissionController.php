<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\PermissionRequest;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'permissions' => Permission::orderBy('created_at', 'desc')->paginate(10),
        ];

        return view(config('app.template').'.permission.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('app.template').'.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        if( Permission::create($request->all()) ){
            return redirect('/user/permission')->with('success', 'Sukses simpan data permission.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data permission.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);

        if( !$permission ){
            return view(config('app.template').'.error.404');
        }

        $data = [
            'permission' => $permission,
        ];

        return view(config('app.template').'.permission.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        if ( Permission::find($id)->update($request->all()) ){
            return redirect('/user/permission')->with('success', 'Sukses ubah data permission.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data permission.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);

        if( $permission && $permission->delete() ){
            return redirect()->back()->with('success', 'Sukses hapus data '.$permission->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data permission.']);
    }
}
