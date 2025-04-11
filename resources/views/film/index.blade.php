@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Film</h1>
    <a href="{{ route('film.create') }}" class="btn btn-primary">Tambah Film</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Genre</th>
                <th>Tahun Rilis</th>
                <th>Director</th>
                <th>Rating</th>
                <th>Poster</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($films as $film)
                <tr>
                    <td>{{ $film->id }}</td>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->genre->name }}</td>
                    <td>{{ $film->release_year }}</td>
                    <td>{{ $film->director }}</td>
                    <td>{{ $film->rating }}</td>
                    <td>
                        <img src="{{ asset('/storage/films/' . $film->poster) }}" class="rounded"
                            style="width: 150px">
                    </td>
                    <td>
                        <a href="{{ route('film.edit', $film->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('film.destroy', $film->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

