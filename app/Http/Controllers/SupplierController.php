<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers= Supplier::all();
        $data=['supplier'=>$suppliers];
        return view('admin.supplier.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
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
            'alamat'=>'required',
            'email'=>'required',
            'telepon'=>'required',
        ];

        $pesan=[
            'nama.required'=>'Nama Tidak Boleh Kosong',
            'alamat'=>'Alamat tidak boleh Kosong',
            'email.required'=>'Email Tidak Boleh Kosong',
            'telepon.required'=>'No Telpon Tidak Boleh Kosong',
        ];

        $validator=Validator::make(Input::all(),$rules,$pesan);
        //jika data ada yang kosong
        if ($validator->fails()) {
            //refresh halaman
            return Redirect::to('admin/pekerja/create')
            ->withErrors($validator);

        }else{

            $suppliers=new \App\Supplier();

            $suppliers->nama=Input::get('nama');
            $suppliers->alamat=Input::get('alamat');
            $suppliers->email=Input::get('email');
            $suppliers->telepon=Input::get('telepon');
            $suppliers->save();

            Session::flash('message','Berhasil Ditambah');

            return redirect::to('admin/pekerja');
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
        $suppliers=\App\Supplier::find($id);
        $d=['supplier'=>$suppliers];
        return view('admin.supplier.edit',compact('suppliers'))->with($d);
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
        $rules=[
            'nama'=>'required',
            'alamat'=>'required',
            'email'=>'required',
            'telepon'=>'required',
        ];

        $pesan=[
            'nama.required'=>'Nama Tidak Boleh Kosong',
            'alamat'=>'Alamat tidak boleh Kosong',
            'email.required'=>'Email Tidak Boleh Kosong',
            'telepon.required'=>'No Telpon Tidak Boleh Kosong',
        ];


        $validator=Validator::make(Input::all(),$rules,$pesan);

        if ($validator->fails()) {
            return Redirect::to('admin/pekerja/'.$id.'/edit')
            ->withErrors($validator);

        }else{



            $suppliers=\App\Supplier::find($id);

            $suppliers->nama=Input::get('nama');
            $suppliers->alamat=Input::get('alamat');
            $suppliers->email=Input::get('email');
            $suppliers->telepon=Input::get('telepon');
            $suppliers->save();

            Session::flash('message','Data Pekerja Berhasil Diubah');

            return Redirect::to('admin/pekerja');
        }
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
