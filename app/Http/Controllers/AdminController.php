<?php

namespace App\Http\Controllers;
use App\Mainan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
    $mainans = Mainan::all();

        return view('admin.admin', compact('mainans'));
    }
    public function create()
    {
        return view('create');
    }
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
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $mainan = Mainan::findOrFail($id);

        return view('edit', compact('mainan'));
    }
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
    public function destroy($id)
    {
        $mainan = Mainan::findOrFail($id);
        $mainan->delete();

        return redirect('/mainans')->with('success', 'Stok telah dihapus');
    }
}

