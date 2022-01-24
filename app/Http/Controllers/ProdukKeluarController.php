<?php

namespace App\Http\Controllers;

use App\Produk_Keluar;
use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use PDF;
use App\Category;
use App\Produk_Masuk;
use App\Supplier;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProdukKeluarController extends Controller
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

        $customers = Customer::orderBy('nama','ASC')
           ->get()
           ->pluck('nama','id');

        $productout= Produk_Keluar::all();
        $data=['productout'=>$productout];

        return view('admin.product_keluar.index', compact('products','customers'))->with($data);
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

        $customers = Customer::orderBy('nama','ASC')
           ->get()
          ->pluck('nama','id');
        //$productin = Produk_Masuk::all();
        //)
        return view('admin.product_keluar.create', compact('customers','products'));
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
            'customer_id'    => 'required',
            'qty'            => 'required',
            'tanggal'        => 'required'
        ]);

        Produk_Keluar::create($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->qty -= $request->qty;
        $product->save();

        return redirect::to('admin/productout');
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
        //$category=\App\category::find($id);
        //$d=['category'=>$category];

           $products = Product::orderBy('name','ASC')
           ->get()
          ->pluck('name','id');

       $customers = Customer::orderBy('nama','ASC')
          ->get()
         ->pluck('nama','id');

        $productout=\App\Produk_Keluar::find($id);
        $d=['productout'=>$productout];
        return view('admin.product_keluar.edit',compact('productout','products','customers'))->with($d);
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
        $product_keluar = Produk_Keluar::findOrFail($id);
        $product_keluar->update($request->all());
        //Produk_Masuk::update($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->qty -= $request->qty;
        $product->save();

        return redirect::to('admin/productout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=\App\Produk_Keluar::find($id);
        $product->delete();

        Session::flash('message','Berhasil Dihapus');
        return Redirect::to('admin/productout');
    }
    public function exportProductKeluarAll()
    {
        $product_keluar = Produk_Keluar::all();
        $pdf = PDF::loadView('admin.product_keluar.productKeluarAllPDF',compact('product_keluar'));
        return $pdf->stream();
    }
}
