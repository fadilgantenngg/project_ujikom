@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Tambah Review</h1>

    <!-- Menampilkan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="film_id" class="form-label">Film</label>
            <select name="film_id" id="film_id" class="form-control @error('film_id') is-invalid @enderror" required>
                @foreach($films as $film)
                    <option value="{{ $film->id }}" {{ old('film_id') == $film->id ? 'selected' : '' }}>
                        {{ $film->title }}
                    </option>
                @endforeach
            </select>
            @error('film_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="0.1" max="10" min="0" name="rating" class="form-control @error('rating') is-invalid @enderror" value="{{ old('rating') }}" required>
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="review" class="form-label">Review</label>
            <textarea name="review" class="form-control @error('review') is-invalid @enderror" rows="4" required>{{ old('review') }}</textarea>
            @error('review')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('review.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
