<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Produk_Masuk;
use App\Supplier;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProdukMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name','ASC')
            ->get()
           ->pluck('name','id');

        $suppliers = Supplier::orderBy('nama','ASC')
            ->get()
            ->pluck('nama','id');

        $productin= Produk_Masuk::all();
        $data=['productin'=>$productin];

        return view('admin.product_masuk.index', compact('products','suppliers'))->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('name','ASC')
            ->get()
           ->pluck('name','id');

        $suppliers = Supplier::orderBy('nama','ASC')
           ->get()
          ->pluck('nama','id');
        //$productin = Produk_Masuk::all();
        //)
        return view('admin.product_masuk.create', compact('suppliers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id'     => 'required',
            'supplier_id'    => 'required',
            'qty'            => 'required',
            'tanggal'        => 'required'
        ]);

        Produk_Masuk::create($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->qty += $request->qty;
        $product->save();

        return redirect::to('admin/productin');

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
        $products = Product::orderBy('name','ASC')
           ->get()
          ->pluck('name','id');

       $suppliers = Supplier::orderBy('nama','ASC')
          ->get()
         ->pluck('nama','id');

        $productin=\App\Produk_Masuk::find($id);
        $d=['productin'=>$productin];
        return view('admin.product_masuk.edit',compact('productin','products','suppliers'))->with($d);
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
        $this->validate($request, [
            'product_id'     => 'required',
            'supplier_id'    => 'required',
            'qty'            => 'required',
            'tanggal'        => 'required'
        ]);
        $product_masuk = Produk_Masuk::findOrFail($id);
        $product_masuk->update($request->all());
        //Produk_Masuk::update($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->qty += $request->qty;
        $product->save();

        return redirect::to('admin/productin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=\App\Produk_Masuk::find($id);
        $product->delete();

        Session::flash('message','Berhasil Dihapus');
        return Redirect::to('admin/productin');
    }
}
