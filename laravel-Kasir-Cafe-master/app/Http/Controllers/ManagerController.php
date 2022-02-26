<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Transaksi;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::paginate(7);
        return view('manager.index', compact('menu'))
                ->with('i',(request()->input('page',1) - 1)*7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu'=>'required',
            'harga'=>'required',
            'deskripsi'=>'required',
            'ketersediaan'=>'required',
        ]);
        $store = Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'ketersediaan' => $request->ketersediaan,
            
        ]);
        if($store){
            return redirect()->route('indexmanager')
                    ->with('success','Berhasil nenden');
        }else{
            return back()->with('error','Gagal bre');
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
        $data= Menu::find($id);
        return view('manager.edit', compact('data'));
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
        $data= Menu::find($id);
        
        $update= $data->update($request->all());
        if($update){
            return redirect()->route('indexmanager')
                    ->with('success','Berhasil ngedit');
        }else{
            return back()->with('error','Gagal bre');
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
        $data= Menu::find($id);
        $delete= $data->delete();
        if($delete){
            return redirect()->route('indexmanager')
                    ->with('success','Berhasil hapus');
        }else{
            return back()->with('error','Gagal bre');
        }
    }

    public function laporan(Request $request){
        $data = Transaksi::paginate(7);
        return view('manager.laporan', compact('data'));
        
    }
    public function cari(Request $request){
        $from = $request->from;
        $to = $request->to;
        $data = Transaksi::whereBetween('tanggal',array($from, $to))->paginate(10);

        return view('manager.laporan', compact('data'));
        
    }
}
