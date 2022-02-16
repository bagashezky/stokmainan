<?php

namespace App\Http\Controllers;
use App\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings= Booking::all();
        $data=['bookings'=>$bookings];
        return view('admin.booking.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'nama'=>'required',
            'lapangan'=>'required',
            'jammulai'=>'required',
            'jamselesai'=>'required',
            'tgl'=>'required'
        ];

        $pesan=[
            'nama.required'=>'Nama Pemesan Tidak Boleh Kosong',
            'lapangan.required'=>'Pilih Lapangan!!',
            'jammulai.required'=>'Silahkan Pilih Jam Mulai',
            'jamselesai.required'=>'Silahkan Pilih Jam Selesai',
            'tgl.required'=>'Silahkan Pilih Tanggal Main'
        ];

        $validator=Validator::make(Input::all(),$rules,$pesan);
        //jika data ada yang kosong
        if ($validator->fails()) {
            //refresh halaman
            return Redirect::to('admin/booking/create')
            ->withErrors($validator);

        }else{

            $Booking=new \App\Booking();

            $Booking->nama=Input::get('nama');
            $Booking->lapangan=Input::get('lapangan');
            $Booking->jammulai=Input::get('jammulai');
            $Booking->jamselesai=Input::get('jamselesai');
            $Booking->tgl=Input::get('tgl');
            $Booking->save();

            Session::flash('message','Berhasil Ditambah');

            return redirect::to('admin/booking');
        }
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
