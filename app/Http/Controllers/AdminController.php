<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user2 = User::all();
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.user', compact('user2', 'user'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function category()
    {
        $ctgr = Category::all();
        $ctgr2 = Category::latest()->first();
        return view('admin.category', compact('ctgr', 'ctgr2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category' => 'required',
        ]);

        Category::create([
            'category' => $request->category,
        ]);

        Alert::success('Berhasil!', 'Data Category berhasil ditambahkan');

        return redirect()->route('admin-category');
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
        $user = User::where('id', $id)->first();

        Alert::success('Berhasil!', 'Selamat data user berhasil diubah');

        return view('admin.useredit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function showUserEdit($id)
    // {
    // $book = Book::all();
    // $ctgr = User::where('category', $request->category)->first();;
    // $user = User::where('id', $id)->first();
    // return view('admin.useredit', compact('user'));
    // }

    public function update(Request $request, $id)
    {
        // $name = $request->input('name');
        // $status = $request->input('status');
        // $email = $request->input('email');
        // $address = $request->input('address');
        // $phone = $request->input('phone');

        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        Alert::success('Berhasil!', 'Selamat edit data user berhasil');

        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        Alert::success('Berhasil!', 'Selamat data user berhasil dihapus');

        return redirect('/admin/user');
    }
}