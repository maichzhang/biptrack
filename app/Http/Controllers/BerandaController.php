<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Forum;

class BerandaController extends Controller
{
    public function index()
    {
        return view('user view/LandingPage');
    }

    public function index1()
{
    $comments = Forum::all();
    return view('user view.LandingPage', compact('comments'));
}
public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'konten' => 'required|max:1000', // Sesuaikan dengan kebutuhan
    ]);

    $forum = new Forum();
    $forum->nama = $request->input('nama');
    $forum->konten = $request->input('konten');
    $forum->save();

    return redirect()->route('user view.landingpage'); // Redirect kembali ke halaman landing page
}
}