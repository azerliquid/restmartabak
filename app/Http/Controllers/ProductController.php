<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = Product::All();
        $product = array('status' => 200, 'data' => $r);
        echo json_encode($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = new Product;
        $product->nama = $request->nama;
        $product->kode_barang = $request->kode_barang;
        $product->harga = $request->harga;
        $product->save();

        return 'succes';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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

        $nama = $request->input('nama');
        $kode_barang = $request->kode_barang;
        $harga = $request->harga;

        // echo json_encode($request);
        echo json_encode(array(
            "nama"=>$nama,
            "kode"=>$kode_barang,
            "harga"=>$harga,
            "item_id"=>$id
        ));

        $product = Product::find($id);
        $product->nama = $nama;
        $product->kode_barang = $kode_barang;
        $product->harga = $harga;

        $product->save();

        return 'succes';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return 'succes';
    }
}
