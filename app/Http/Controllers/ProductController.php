<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->orderBy('products.id', 'DESC')->get();
        return view('product.index', ['products' => $product]);
    }

    public function create()
    {
        $faker = Faker::create();
        $productCode = $faker->numerify('P-#####');
        return view('product.create', ['productCode' => $productCode]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'      => 'required|max:60',
            'category_id'       => 'required',
            'stock'             => 'required|numeric',
            'price'             => 'required|numeric',
            'unit'              => 'required|in:PCS,LBR',
            'discount_amount'  => 'required|numeric',
            'image'             => 'required|mimes:jpg,png,jpeg|max:1024',
            'description'       => 'required'
        ], [
            'product_name.required'         => 'Nama Produk tidak boleh kosong.',
            'product_name.max'              => 'Nama Produk terlalu panjang.',
            'category_id.required'          => 'Kategori tidak boleh kosong.',
            'stock.required'                => 'Stok tidak boleh kosong.',
            'stock.numeric'                 => 'Stok harus berupa angka.',
            'price.required'                => 'Harga tidak boleh kosong.',
            'price.numeric'                 => 'Harga harus berupa angka.',
            'unit.required'                 => 'Satuan tidak boleh kosong.',
            'unit.in'                       => 'Satuan harus salah satu dari: PCS, LBR.',
            'discount_amount.required'      => 'Jumlah diskon tidak boleh kosong.',
            'discount_amount.numeric'       => 'Jumlah diskon harus berupa angka.',
            'image.required'                => 'Gambar tidak boleh kosong.',
            'image.mimes'                   => 'Format gambar harus jpg, png, atau jpeg.',
            'image.max'                     => 'Ukuran gambar tidak boleh lebih dari 1024 KB.',
            'description.required'          => 'Deskripsi tidak boleh kosong.'
        ]);
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/img'), $filename);
        DB::table('products')->insert([
            'product_name' => $request->post('product_name'),
            'category_id'  => $request->post('category_id'),
            'product_code' => $request->post('product_code'),
            'description'  => $request->post('description'),
            'price'        => $request->post('price'),
            'unit'         => $request->post('unit'),
            'discount_amount' => $request->post('discount_amount'),
            'stock'        => $request->post('stock'),
            'image'        => $filename
        ]);
        return redirect()->route('produk')->with('success', 'Data Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = DB::table('products')->find(Crypt::decrypt($id));
        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name'      => 'required|max:60',
            'category_id'       => 'required',
            'stock'             => 'required|numeric',
            'price'             => 'required|numeric',
            'unit'              => 'required|in:PCS,LBR',
            'discount_amount'  => 'required|numeric',
            'image'             => 'mimes:jpg,png,jpeg|max:1024',
            'description'       => 'required'
        ], [
            'product_name.required'         => 'Nama Produk tidak boleh kosong.',
            'product_name.max'              => 'Nama Produk terlalu panjang.',
            'category_id.required'          => 'Kategori tidak boleh kosong.',
            'stock.required'                => 'Stok tidak boleh kosong.',
            'stock.numeric'                 => 'Stok harus berupa angka.',
            'price.required'                => 'Harga tidak boleh kosong.',
            'price.numeric'                 => 'Harga harus berupa angka.',
            'unit.required'                 => 'Satuan tidak boleh kosong.',
            'unit.in'                       => 'Satuan harus salah satu dari: PCS, LBR.',
            'discount_amount.required'      => 'Jumlah diskon tidak boleh kosong.',
            'discount_amount.numeric'       => 'Jumlah diskon harus berupa angka.',
            'image.mimes'                   => 'Format gambar harus jpg, png, atau jpeg.',
            'image.max'                     => 'Ukuran gambar tidak boleh lebih dari 1024 KB.',
            'description.required'          => 'Deskripsi tidak boleh kosong.'
        ]);
        $product = DB::table('products')->find($id);
        if ($request->hasFile('image')) {
            unlink(public_path('assets/img/' . $product->image));
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $filename);
            DB::table('products')->where('id', $id)->update([
                'product_name' => $request->post('product_name'),
                'category_id'  => $request->post('category_id'),
                'product_code' => $request->post('product_code'),
                'description'  => $request->post('description'),
                'price'        => $request->post('price'),
                'unit'         => $request->post('unit'),
                'discount_amount' => $request->post('discount_amount'),
                'stock'        => $request->post('stock'),
                'image'        => $filename
            ]);
            return redirect()->route('produk')->with('success', 'Gambar dan Data produk perhasil diperbarui.');
        } else {
            DB::table('products')->where('id', $id)->update([
                'product_name' => $request->post('product_name'),
                'category_id'  => $request->post('category_id'),
                'product_code' => $request->post('product_code'),
                'description'  => $request->post('description'),
                'price'        => $request->post('price'),
                'unit'         => $request->post('unit'),
                'discount_amount' => $request->post('discount_amount'),
                'stock'        => $request->post('stock')
            ]);
            return redirect()->route('produk')->with('success', 'Data produk berhasil diperbarui.');
        }
    }

    public function destroy($id)
    {
        $product = DB::table('products')->find(Crypt::decrypt($id));
        $path = public_path('assets/img/' . $product->image);
        if (!file_exists($path)) {
            DB::table('products')->where('id', $product->id)->delete();
            return redirect()->route('produk')->with('success', 'Data produk berhasil dihapus.');
        } else {
            unlink($path);
            DB::table('products')->where('id', $product->id)->delete();
            return redirect()->route('produk')->with('success', 'Data produk berhasil dihapus.');
        }
    }
}
