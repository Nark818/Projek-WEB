<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Order;
use App\Models\Cart;

class SellerController extends Controller
{
    //Menuju ke tambah toko
    public function add_store()
    {
        $store = Store::where('seller_id', Auth::user()->id)->first();
        if ($store) {
            return redirect('seller/dashboard');
        }
        return view('dashboard.seller.add_store');
    }

    //Simpan Toko
    public function save_store(Request $request)
    {
        $store = Store::where('seller_id', Auth::user()->id)->first();
        if ($store) {
            return back()->with('error', 'You need to create a store first.');
        }

        $store = new Store;

        $store->name = $request->name;
        $store->description = $request->description;
        $store->address = $request->address;
        $store->seller_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('stores'), $imageName);
            $store->image = $imageName;
        }

        $store->save();

        return redirect('seller/dashboard');
    }

    //Menuju ke store
    public function edit_store()
    {
        $store = Store::where('seller_id', Auth::user()->id)->first();
        return view('dashboard.seller.edit_store', compact('store'));
    }

    public function update_store(Request $request, $id)
    {
        $store = Store::find($id);

        $store->name = $request->name;
        $store->description = $request->description;
        $store->address = $request->address;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('stores'), $imageName);
            $store->image = $imageName;
        }

        $store->save();

        return redirect('seller/dashboard');
    }


    //Menuju ke view tambah Produk
    public function add_produk()
    {
        $category = Category::all();

        return view("dashboard.seller.add_produk", compact('category'));
    }

    //Menambah Produk
    public function upload_produk(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $store = Store::where('seller_id', Auth::user()->id)->first();
        if (!$store) {
            return redirect('seller/add_store')->with('error', 'You need to create a store first.');
        }

        $data = new Produk;

        $data->name = $request->name;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->stock = $request->stock;

        $data->category = $request->category;
        
        $data->store_id = $store->id;

        $data->seller_id = Auth::user()->id;

        $image = $request->image;

        if ($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('produks', $imagename);

            $data->image = $imagename;

        }

        $data->save();

        return redirect()->back()->with('success', 'Product added successfully.');

    }

    //Melihat Produk
    public function view_produk()
    {
        // Mendapatkan ID seller yang sedang login
        $seller_id = Auth::user()->id;

        // Mengambil hanya produk yang dimiliki oleh seller tersebut
        $produks = Produk::where('seller_id', $seller_id)->get();

        // Mengirim data produk ke view
        return view('dashboard.seller.view_produk', compact('produks'));
    }

    //Delete Produk
    public function delete_produk($id)
    {
        // Hapus entri terkait di tabel orders
        Order::where('produk_id', $id)->delete();
        
        // Hapus entri terkait di tabel carts
        Cart::where('produk_id', $id)->delete();
        
        // Temukan produk yang akan dihapus
        $data = Produk::find($id);
        
        // Hapus gambar produk jika ada
        $image_path = public_path('produks/'.$data->image);
        if (file_exists($image_path))
        {
            unlink($image_path);
        }
        
        // Hapus produk
        $data->delete();
        
        return redirect()->back();
    }

    //Mengubah Produk
    public function edit_produk($id)
    {
        $data = Produk::where('id', $id)->first();



        return view('dashboard.seller.update_page', compact('data'));
    }

    public function update_produk(Request $request, $id)
    {
        $data = Produk::find($id);

        $data->name = $request->name;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->stock = $request->stock;

        $image = $request->image;

        if ($image) {
            
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('produks', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect('/view_produk');
    }

    //Menacari Produk
    public function search_produk(Request $request)
    {
        $search = $request->search;

        $produks = Produk::where('name', 'LIKE', '%'.$search.'%')->paginate(3);

        return view('dashboard.seller.view_produk', compact('produks'));
    }

    public function view_order()
    {
        $seller_id = Auth::user()->id;
        $data = Order::whereHas('produk', function($query) use ($seller_id) {
            $query->where('seller_id', $seller_id);
        })->get();

        return view('dashboard.seller.order', compact('data'));
    }

    public function on_the_way($id)
    {
        $order = Order::find($id);

        if ($order->produk->seller_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'You do not have permission to change the status of this order.');
        }

        $order->status = 'On the way';
        $order->save();

        return redirect()->back();
    }

    public function delivered($id)
    {
        $order = Order::find($id);

        if ($order->produk->seller_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'You do not have permission to change the status of this order.');
        }

        $order->status = 'Delivered';
        $order->save();

        return redirect()->back();
    }
}
