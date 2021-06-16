<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $produks = Produk::latest()->paginate(5);
         
        /// mengirimkan variabel $posts ke halaman views posts/index.blade.php
        /// include dengan number index
        return view('produk.index',compact('produks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /// menampilkan halaman create
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /// membuat validasi untuk title dan content wajib diisi
       $request->validate([
        'nama_produk' => 'required',
        'keterangan' => 'required',
        'harga' => 'required',
        'jumlah' => 'required',
    ]);
     
    /// insert setiap request dari form ke dalam database via model
    /// jika menggunakan metode ini, maka nama field dan nama form harus sama
    Produk::create($request->all());
     
    /// redirect jika sukses menyimpan data
    return redirect()->route('produk.index')
                    ->with('success','Berhasil di simpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('produk.show',$produk->id) }}
        return view('produk.show',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.edit',$post->id) }}
        return view('produk.edit',compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
        'nama_produk' => 'required',
        'keterangan' => 'required',
        'harga' => 'required',
        'jumlah' => 'required',
        ]);
         
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $produk->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('produk.index')
                        ->with('info','Berhasil Di Edit');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $produk->delete();
  
        return redirect()->route('produk.index')
                        ->with('danger','Berhasil Di Hapus');
  
    }
}
