<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Menampilkan daftar review.
     */
    public function index()
    {
        $reviews = Review::with('film', 'user')->latest()->get();
        return view('review.index', compact('reviews'));
    }

    /**
     * Menampilkan form tambah review.
     */
    public function create()
    {
        $films = Film::all(); // Mengambil daftar film
        return view('review.create', compact('films'));
    }

    /**
     * Menyimpan review baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'rating' => 'required|numeric|min:0|max:10',
            'review' => 'required|string|min:10',
        ]);

        Review::create([
            'film_id' => $request->film_id,
            'user_id' => Auth::id(), // Mengambil ID user yang sedang login
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit review.
     */
    public function edit(Review $review)
    {
        $this->authorize('update', $review); // Hak akses hanya untuk pemilik review

        $films = Film::all();
        return view('review.edit', compact('review', 'films'));
    }

    /**
     * Mengupdate review yang ada.
     */
    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review); // Hak akses hanya untuk pemilik review

        $request->validate([
            'film_id' => 'required|exists:films,id',
            'rating' => 'required|numeric|min:0|max:10',
            'review' => 'required|string|min:10',
        ]);

        $review->update([
            'film_id' => $request->film_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('review.index')->with('success', 'Review berhasil diperbarui.');
    }

    /**
     * Menghapus review.
     */
    public function destroy(Review $review)
    {
        $this->authorize('delete', $review); // Hak akses hanya untuk pemilik review
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review berhasil dihapus.');
    }
}
