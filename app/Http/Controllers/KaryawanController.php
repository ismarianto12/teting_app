<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// use Tmkaryawan;
// use Trpekerjaan;
// use Trpekerjaan;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datakaraywan = '';
        return view('karyawan', [
            'data' => $datakaryawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = new Tmkaryawan();
        $data->nama = $request->nama;
        $data->no_ktp = $request->no_ktp;
        $data->ttl = $request->ttl;
        $data->jk = $request->jk;
        $data->agama = $request->agama;
        $data->goldarah = $request->goldarah;
        $data->status = $request->status;
        $data->alamat_ktp = $request->alamat_ktp;
        $data->alamat_tinggal = $request->alamat_tinggal;
        $data->email = $request->email;
        $data->notelp = $request->notelp;
        $data->ortedekat = $request->ortedekat;


        $data->save();

        $data_1 = new Trpekerjaan();
        $data_1->id_pendaftar = $request->id_pendaftar;
        $data_1->nmpekerjaan = $request->nmpekerjaan;
        $data_1->posisiterakhir = $request->posisiterakhir;
        $data_1->pendapatantrakhir = $request->pendapatantrakhir;
        $data_1->tahun = $request->tahun;


        $data->save();


        $rfdata = new Trpekerjaan;
        $rfdata->id_pendaftar = $request->id_pendaftar;
        $rfdata->nmpekerjaan = $request->nmpekerjaan;
        $rfdata->posisiterakhir = $request->posisiterakhir;
        $rfdata->pendapatantrakhir = $request->pendapatantrakhir;
        $rfdata->tahun = $request->tahun;

        $data->save();


        $rfdata = new Trpekerjaan;
        $rfdata->id_pendaftar = $request->id_pendaftar;
        $rfdata->nmpekerjaan = $request->nmpekerjaan;
        $rfdata->posisiterakhir = $request->posisiterakhir;
        $rfdata->pendapatantrakhir = $request->pendapatantrakhir;
        $rfdata->tahun = $request->tahun;
        $data->save();

        response()->json([
            'msg' => 'data berhasil di simpan',
            'status' => 1,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
