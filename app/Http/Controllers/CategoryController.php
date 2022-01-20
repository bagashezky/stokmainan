<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //

        $categories=\App\Category::all();
        $data=['categories'=>$categories];
        return view('admin.category.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=>'required',
        ];

        $pesan=[
            'name.required'=>'Nama Barang Tidak Boleh Kosong',
        ];

        $validator=Validator::make(Input::all(),$rules,$pesan);

        //jika data ada yang kosong
        if ($validator->fails()) {

            //refresh halaman
            return Redirect::to('admin/category/create')
            ->withErrors($validator);

        }else{

            $category=new \App\Category();

            $category->name=Input::get('name');
            $category->save();

            Session::flash('message','Berhasil Ditambah');

            return redirect::to('admin/category');
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
        $category=\App\category::find($id);
        $d=['category'=>$category];
        return view('admin.category.edit')->with($d);
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
        $rules=[

            'name'=>'required',
        ];

        $pesan=[
            'name.required'=>'Nama Tidak Boleh Kosong!!',
        ];


        $validator=Validator::make(Input::all(),$rules,$pesan);

        if ($validator->fails()) {
            return Redirect::to('admin/category/'.$id.'/edit')
            ->withErrors($validator);

        }else{

            $image="";

            if (!$request->file('imageFile')) {
                # code...
                $image=Input::get('imagePath');
            }else{
                $image=$request->file('imageFile')->store('categoryImages','public');
            }

            $category=\App\category::find($id);

            $category->name=Input::get('name');
            $category->save();

            Session::flash('message','Data Barang Berhasil Diubah');

            return Redirect::to('admin/category');
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
        $category=\App\Category::find($id);
        $category->delete();

        Session::flash('message','Berhasil Dihapus');
        return Redirect::to('admin/category');
    }
}
