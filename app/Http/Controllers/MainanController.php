<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mainan;
class MainanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainans = Mainan::all();

        return view('index', compact('mainans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mainan_name' => 'required|max:255',
            'mainan_stok' => 'required|alpha_num',
            'mainan_price' => 'required|numeric'
        ]);
        $mainan = Mainan::create($validatedData);

        return redirect('/mainans')->with('success', 'Stok Berhasil Disimpan');
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
        $mainan = Mainan::findOrFail($id);

        return view('edit', compact('mainan'));
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
        $validatedData = $request->validate([
            'mainan_name' => 'required|max:255',
            'mainan_stok' => 'required|alpha_num',
            'mainan_price' => 'required|numeric',
        ]);
        Mainan::whereId($id)->update($validatedData);

        return redirect('/mainans')->with('success', 'Stok Telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainan = Mainan::findOrFail($id);
        $mainan->delete();

        return redirect('/mainans')->with('success', 'Stok telah dihapus');
    }
}
