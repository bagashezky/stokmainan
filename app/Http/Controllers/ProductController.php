<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('name','ASC')
            ->get()
            ->pluck('name','id');

        $products= Product::all();
        $data=['products'=>$products];

        return view('admin.product.index', compact('categories'))->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $categories = Category::orderBy('name','ASC')
            ->get()
           ->pluck('name','id');
        //$category_id = Category::all();
        //)
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$category_id = Category::all();
        //$category_id = Category::pluck('name', 'id');
        $rules =[
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|integer',
            'imageFile'=>'required|mimes:jpg,png,jpeg,JPG',
            'qty'=>'required'
        ];

        $pesan=[
            'name.required'=>'Nama Barang Tidak Boleh Kosong',
            'category_id'=>'Kategori tidak boleh Kosong',
            'price.required'=>'Harga Barang Tidak Boleh Kosong',
            'imageFile.required'=>'Gambar Tidak Boleh Kosong',
            'qty.required'=>'Jumlah Stok Tidak Boleh Kosong'
        ];

        $validator=Validator::make(Input::all(),$rules,$pesan);
        //jika data ada yang kosong
        if ($validator->fails()) {
            //refresh halaman
            return Redirect::to('admin/product/create',compact('category_id'))
            ->withErrors($validator);

        }else{

            $image=$request->file('imageFile')->store('productImages','public');

            $product=new \App\Product;

            $product->name=Input::get('name');
            $product->category_id=Input::get('category_id');
            $product->qty=Input::get('qty');
            $product->price=Input::get('price');
            $product->image=$image;
            $product->save();

            Session::flash('message','Berhasil Ditambah');

            return redirect::to('admin/product');
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
        $product=\App\Product::find($id);
        $d=['product'=>$product];
        return view('admin.product.show')->with($d);
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
        $categories = Category::orderBy('name','ASC')
            ->get()
           ->pluck('name','id');
        $product=\App\Product::find($id);
        $d=['product'=>$product];
        return view('admin.product.edit',compact('categories'))->with($d);
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
        $categories = Category::orderBy('name','ASC')
            ->get()
           ->pluck('name','id');
        $rules=[

            'name'=>'required',
            'price'=>'required|integer',
            'qty'=>'required',
        ];

        $pesan=[
            'name.required'=>'Nama Tidak Boleh Kosong!!',
            'price.required'=>'Harga Tidak Boleh Kosong!!',
            'qty.required'=>'Jumlah Barang Tidak Boleh Kosong!!',
        ];


        $validator=Validator::make(Input::all(),$rules,$pesan);

        if ($validator->fails()) {
            return Redirect::to('admin/product/'.$id.'/edit')
            ->withErrors($validator);

        }else{

            $image="";

            if (!$request->file('imageFile')) {
                # code...
                $image=Input::get('imagePath');
            }else{
                $image=$request->file('imageFile')->store('productImages','public');
            }

            $product=\App\Product::find($id);

            $product->name=Input::get('name');
            $product->category_id=Input::get('category_id');
            $product->price=Input::get('price');
            $product->qty=Input::get('qty');
            $product->image=$image;
            $product->save();

            Session::flash('message','Data Barang Berhasil Diubah');

            return Redirect::to('admin/product');
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
        $product=\App\Product::find($id);
        $product->delete();

        Session::flash('message','Berhasil Dihapus');
        return Redirect::to('admin/product');
    }


}
