<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangLog;

class BarangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    private function logBarang(Barang $barang, $amount, $type){
        BarangLog::create([
            'barang_id' => $barang->id,
            'jumlah' => $amount,
            'jenis_transaksi' => $type,
        ]);
    }

    public function index()
    {
        $limit = request()->limit ?? 10;
        $barangs = Barang::paginate($limit);
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|string',
            'stok' => 'required|integer',
            'supplier' => 'required|string',
        ]);

        $barang = Barang::create([
            'name' => request()->name,
            'stok' => request()->stok,
            'supplier' => request()->supplier,
        ]);

        $this->logBarang($barang, $barang->stok, 'pembelian');

        return redirect()->route('barang.index')->with('success','Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Barang $barang)
    {
        request()->validate([
            'name' => 'required|string',
            'supplier' => 'required|string',
        ]);
        $barang->update(request()->all());
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diedit.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }

    public function getPembelian(){
        $barangs = Barang::where('stok', '>', 0)->get();
        return view('barang.pembelian', compact('barangs'));
    }

    public function postPembelian(){
        request()->validate([
            'barang_id' => 'required|integer',
            'amount' => 'required|integer',
        ]);


        $amount = request()->amount;
        $barang = Barang::find(request()->barang_id);
        if($barang){
            $barang->stok += $amount;
            $barang->save();

            $this->logBarang($barang, $amount, 'pembelian');
        }

        return redirect()->route('barang.index')->with('success', "Berhasil membeli $amount <strong>$barang->name</strong>.");
    }

    public function getPenjualan(){
        $barangs = Barang::where('stok', '>', 0)->get();
        return view('barang.penjualan', compact('barangs'));
    }

    public function postPenjualan(){
        request()->validate([
            'barang_id' => 'required|integer',
            'amount' => 'required|integer',
        ]);

        $amount = request()->amount;
        $barang = Barang::find(request()->barang_id);
        if($barang){
            $barang->stok -= $amount;
            $barang->save();

            $this->logBarang($barang, $amount, 'penjualan');
        }

        return redirect()->route('barang.index')->with('success', "Berhasil menjual $amount <strong>$barang->name</strong>.");
    }
}
