<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers= Customer::all();
        $data=['customers'=>$customers];
        return view('admin.customers.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
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
            return Redirect::to('admin/customers/create')
            ->withErrors($validator);

        }else{

            $customers=new \App\Customer();

            $customers->nama=Input::get('nama');
            $customers->alamat=Input::get('alamat');
            $customers->email=Input::get('email');
            $customers->telepon=Input::get('telepon');
            $customers->save();

            Session::flash('message','Berhasil Ditambah');

            return redirect::to('admin/customers');
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
        $customers=\App\Customer::find($id);
        $d=['customer'=>$customers];
        return view('admin.customers.edit',compact('customers'))->with($d);
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
            return Redirect::to('admin/customers/'.$id.'/edit')
            ->withErrors($validator);

        }else{



            $customers=\App\Customer::find($id);

            $customers->nama=Input::get('nama');
            $customers->alamat=Input::get('alamat');
            $customers->email=Input::get('email');
            $customers->telepon=Input::get('telepon');
            $customers->save();

            Session::flash('message','Data Customer Berhasil Diubah');

            return Redirect::to('admin/customers');
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
