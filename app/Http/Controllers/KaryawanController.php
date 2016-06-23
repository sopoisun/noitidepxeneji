<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\KaryawanRequest;
use App\Karyawan;
use Carbon\Carbon;
use DB;
use Gate;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Gate::denies('karyawan.read') ){
            return view(config('app.template').'.error.403');
        }

        $data = [
            'karyawans' => Karyawan::with('user.roles')->where('active', 1)->get(),
        ];

        return view(config('app.template').'.karyawan.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Gate::denies('karyawan.create') ){
            return view(config('app.template').'.error.403');
        }

        return view(config('app.template').'.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaryawanRequest $request)
    {
        if( Karyawan::create($request->all()) ){
            return redirect('/karyawan')->with('success', 'Sukses simpan data karyawan.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data karyawan.']);
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
        if( Gate::denies('karyawan.update') ){
            return view(config('app.template').'.error.403');
        }

        $karyawan = Karyawan::find($id);

        if( !$karyawan ){
            return view(config('app.template').'.error.404');
        }

        $data = ['karyawan' => $karyawan];

        return view(config('app.template').'.karyawan.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KaryawanRequest $request, $id)
    {
        if( Karyawan::find($id)->update($request->all()) ){
            return redirect('/karyawan')->with('success', 'Sukses ubah data karyawan.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data karyawan.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Gate::denies('karyawan.delete') ){
            return view(config('app.template').'.error.403');
        }

        $karyawan = Karyawan::find($id);

        if( $karyawan && $karyawan->update(['active' => 0]) ){

            if( $karyawan->user_id != null ){
                \App\User::find($karyawan->user_id)->update(['active', 0]);
            }

            return redirect()->back()->with('success', 'Sukses hapus data '.$karyawan->nama.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data karyawan.']);
    }

    public function ajaxLoad(Request $request)
    {
        if( $request->get('id') ){
            return Karyawan::where('active', 1)->where('id', $request->get('id'))->first();
        }elseif($request->get('ids')){
            return Karyawan::whereIn('id', explode('+', $request->get('ids')))->where('active', 1)->get();
        }else{
            $karyawan = Karyawan::where('nama', 'like', '%'.$request->get('q').'%')->where('active', 1);
            if( $request->get('foruser') ){
                $karyawan = $karyawan->whereNull('user_id');
            }
            return $karyawan->get();
        }
    }
}
