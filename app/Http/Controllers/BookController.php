<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        // $book3 = Book::where('id', '=', Auth::user()->id);
        return view('admin.book', compact('book'));
    }

    public function showCover($id)
    {
        $book = Book::where('id', $id)->first();
        return view('admin.cover', compact('book'));
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
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'ISBN' => 'required',
            'category' => 'required',
            'synopsis' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $namafile = time() . "-" . $file->getClientOriginalName();
            $file->move(public_path('/assets/cover/'), $namafile);
        }

        Book::create([
            // 'book_id' => Auth::user()->id,
            'title' => $request->title,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'ISBN' => $request->ISBN,
            'category' => $request->category,
            'synopsis' => $request->synopsis,
            'cover' => $namafile,
        ]); 

        Alert::success('Berhasil!','Data buku berhasil ditambahkan');

        return redirect ('/admin/book');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book, $id)
    {
        $book = Book::where('id', $id)->first();
        return view('admin.bookedit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book, $id)
    {
        $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'ISBN' => 'required',
            'category' => 'required',
            'synopsis' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $namafile = time() . "-" . $file->getClientOriginalName();
            $file->move(public_path('/assets/cover/'), $namafile);
        }

        Book::where('id', $id)->update([
            'title' => $request->title,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'ISBN' => $request->ISBN,
            'category' => $request->category,
            'synopsis' => $request->synopsis,
            'cover' => $namafile,
        ]);

        Alert::success('Berhasil!', 'Selamat edit data buku berhasil');

        return redirect('/admin/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, $id)
    {
        Book::where('id', $id)->delete();
        Alert::success('Berhasil!', 'Selamat data buku berhasil dihapus');
        return redirect('/admin/book');
    }
}
