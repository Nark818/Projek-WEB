<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use App\Models\Cart;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Store;

class HomeController extends Controller
{
    //login untuk admin ke dashboard
    public function index()
    {
        return view('dashboard.admin.index');
    }

    //login ke halaman home
    public function home()
    {
        $produks = Produk::all()->shuffle(); // Mengacak urutan produk

        if(Auth::id())
        {
            $user = Auth::user();
    
            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
    
        }

        else
        {
            $count = '';
        }

        return view('home.index', compact('produks', 'count'));
    }

    public function login_home()
    {
        $produks = Produk::all()->shuffle(); // Mengacak urutan produk

        if(Auth::id())
        {
            $user = Auth::user();
    
            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
    
        }

        else
        {
            $count = '';
        }
        
        return view('home.index', compact('produks', 'count'));   
    }

    //ke halaman produk details
    public function produk_details($id)
    {
        $data = Produk::find($id);
        $store = Store::where('id', $data->store_id)->first(); // Asumsikan ada kolom store_id di tabel produk

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.produk_details', compact('data', 'count', 'store'));
    }

    //
    public function seller_dashboard()
    {
        $produks = Produk::where('seller_id', Auth::user()->id)->get();
        $store = Store::where('seller_id', Auth::user()->id)->first();

        return view('dashboard.seller.index', compact('produks', 'store'));
    }

    //my order
    public function myorders()
    {
        $user = Auth::user();
        $count = Cart::where('user_id', $user->id)->count();
        $orders = Order::where('user_id', $user->id)->with('produk.store')->get();

        return view('home.order', compact('count', 'orders'));
    }

    //menambah ke cart
    public function add_cart($id)
    {
        $produk = Produk::find($id);

        if ($produk->stock > 0) {
            // Kurangi stok
            $produk->stock -= 1;
            $produk->save();

            // Tambahkan ke keranjang
            $user = Auth::user();
            $user_id = $user->id;

            $data = new Cart;
            $data->user_id = $user_id;
            $data->produk_id = $id;
            $data->save();

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    //menampilkan cart
    public function mycart()
    {
        if (Auth::id())
        {
            
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }

        return view('home.mycart', compact('count', 'cart'));
    }

    //menghapus cart
    public function delete_cart($id)
    {
        $cart = Cart::find($id);
        $produk = Produk::find($cart->produk_id);

        // Tambahkan stok produk
        $produk->stock += 1;
        $produk->save();

        // Hapus produk dari keranjang
        $cart->delete();

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;

        $address = $request->address;

        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();
        
        foreach($cart as $carts)
        {
            $order = new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->produk_id = $carts->produk_id;

            $order->save();

        }

        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();
        }

        return redirect()->back();
    }

    public function view_favorite()
    {
        $data = Produk::all();

        if(Auth::id())
        {
            $user = Auth::user();
    
            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
    
        }

        else
        {
            $count = '';
        }

        $user = Auth::user();

        $userid = $user->id;

        $favorite = Favorite::where('user_id', $userid)->with('produk')->get();

        return view('home.myfavorite', compact('favorite', 'count', 'data'));
    }

    public function delete_favorite($id)
    {
        $data = Favorite::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function add_favorite($id)
    {
        $produk_id = $id;
        
        $user = Auth::user();
        $user_id = $user->id;

        // Cek apakah produk sudah ada di favorit
        $existingFavorite = Favorite::where('user_id', $user_id)->where('produk_id', $produk_id)->first();
        if ($existingFavorite) {
            $existingFavorite->delete();

            return redirect('/myfavorite');
        }

        $data = new Favorite;
        $data->user_id = $user_id;
        $data->produk_id = $produk_id;
        $data->save();

        toastr()->closeButton()->timeOut(10000)->options(['positionClass' => 'toast-bottom-left'])->success('Produk Added Successfully to Favorite');
        return redirect('/myfavorite');
    }

    //view search produk
    public function search_produk()
    {
        $produks = Produk::all()->shuffle();

        if(Auth::id())
        {
            $user = Auth::user();
    
            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
    
        }

        else
        {
            $count = '';
        }

        return view('home.search_produk', compact('produks', 'count'));
    }

    public function find_produk(Request $request)
    {
        $search = $request->search;

        $produks = Produk::where('name', 'like', '%'.$search.'%')->get();

        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.search_produk', compact('produks', 'count'));
    }
}
