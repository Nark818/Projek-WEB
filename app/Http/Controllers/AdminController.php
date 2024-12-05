<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Produk;

class AdminController extends Controller
{
    //Total Users
    public function total_users()
    {
        // Menghitung total pengguna
        $users = User::count();

        // Menghitung pengguna dengan role 'Buyer'
        $buyers = User::where('role', 'Buyer')->count();

        // Menghitung pengguna dengan role 'Seller'
        $sellers = User::where('role', 'Seller')->count();

        // Mengirim data ke view
        return view('dashboard.admin.index', compact('users', 'buyers', 'sellers'));
    }

    //Melihat data user
    public function view_user()
    {
        $user = User::all();

        return view('dashboard.admin.manage_user', compact('user'));
    }

    //ke halaman Membuat user
    public function create_user()
    {
        return view('dashboard.admin.create_user');
    }

    //Menambahkan user
    public function upload_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'nullable|string|max:255',
            'role' => 'required|in:buyer,seller,admin',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->role = $request->role;
        $user->save();

        return redirect('manage_user');
    }

    //Mengubah data User
    public function update_user($id)
    {
        $data = User::find($id);

        return view('dashboard.admin.update_user', compact('data'));
    }

    public function edit_user(Request $request, $id)
    {
        $data = User::find($id);

        $data->name = $request->name;

        $data->email = $request->email;

        $data->address = $request->address;

        $data->save();

        return redirect('/manage_user');
    }

    public function delete_user($id)
    {
        $data = User::find($id);

        $data->delete();

        return redirect()->back();

    }

     //Melihat Kategori
    public function view_category()
    {
        $data = Category::all();
        return view('dashboard.admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->closeButton()->timeOut(10000)->positionClass(['toast-bottom-left'])->addCreated('Category Added Successfully');

        return redirect()->back();
    }

    public function detele_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('dashboard.admin.edit_category', compact('data'));
    }

    //ke halaman Membuat kategori
    public function create_category()
    {
        return view('dashboard.admin.create_category');
    }

    //Menambahkan kategori
    public function upload_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories',
        ]);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    //Melihat Produk
    public function manage_produk()
    {
        $produks = Produk::all();
        return view('dashboard.admin.manage_produk', compact('produks'));
    }

    public function del_produk($id)
    {
        // Hapus entri terkait di tabel carts
        Cart::where('produk_id', $id)->delete();
    
        // Hapus entri terkait di tabel orders
        Order::where('produk_id', $id)->delete();
    
        // Temukan produk yang akan dihapus
        $produk = Produk::find($id);
    
        // Hapus gambar produk jika ada
        $image_path = public_path('produks/'.$produk->image);
        if (file_exists($image_path))
        {
            unlink($image_path);
        }
    
        // Hapus produk
        $produk->delete();
    
        return redirect()->back();
    }
}
