<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
class FrontendController extends Controller
{
    // Menampilkan daftar film di frontend
    public function index()
    {
        // Mengambil semua data film dari database
        $films = Film::all();

        // Mengirim data film ke view
        return view('frontend', compact('films'));
    }

    // Menyediakan API endpoint (jika frontend pakai Vue/React)
    public function apiIndex()
    {
        $films = Film::all();

        return response()->json($films);
    }
    public function show(Film $film)
{
    return view('film.show', compact('film'));  // Menampilkan halaman detail film
}

}
