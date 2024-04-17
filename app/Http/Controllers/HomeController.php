<?php

namespace App\Http\Controllers;


use App\Models\jualbeli;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Edit;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function tambah(){
        return view('order.tambah');
    }

    public function simpan(Request $request)
    {
        $simpan = new jualbeli();
        $simpan->joki = $request->joki;
        $simpan->isi = $request->isi;
        $simpan->harga = $request->harga;
        $simpan->save();
        Alert::success('Added Successfully', 'Nice Bro');
        return redirect()->route('home');
    }

    public function hapus($id)
    {
        $hapus = jualbeli::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        $data = jualbeli :: findOrfail($id);
        return view('home')->with([
            'data' => $data
        ]);
    }

    public function editproses(Request $request, $id)
    {
        $simpan = jualbeli :: findOrfail($id);
        $simpan->joki = $request->joki;
        $simpan->isi = $request->isi;
        $simpan->harga = $request->harga;
        $simpan->save();
        Alert::success('Edit Successfully', 'Have Nice Days Bro');
        return redirect()->route('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            'datas' => jualbeli::all()
        ]);
    }
}
