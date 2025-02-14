<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::with('genre')->get();
        return view('film.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('film.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_year' => 'required|integer',
            'genre_id' => 'required|exists:genres,id',
            'director' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|numeric|min:0|max:10',
        ]);

        $data = $request->only(['title', 'description', 'release_year', 'genre_id', 'director', 'rating']);

        if ($request->hasFile('poster')) {
            $fileName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('images/films'), $fileName);
            $data['poster'] = $fileName;
        }

        Film::create($data);
        return redirect()->route('film.index')->with('success', 'Film berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        $genres = Genre::all();
        return view('film.edit', compact('film', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_year' => 'required|integer',
            'genre_id' => 'required|exists:genres,id',
            'director' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|numeric|min:0|max:10',
        ]);

        $data = $request->only(['title', 'description', 'release_year', 'genre_id', 'director', 'rating']);

        if ($request->hasFile('poster')) {
            $fileName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('images/films'), $fileName);
            $data['poster'] = $fileName;
        }

        $film->update($data);
        return redirect()->route('film.index')->with('success', 'Film berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('film.index')->with('success', 'Film berhasil dihapus');
    }
}
