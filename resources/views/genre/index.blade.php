@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Genre</h1>
    <a href="{{ route('genre.create') }}" class="btn btn-primary">Tambah Genre</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Genre</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('genre.destroy', $genre->id) }}" method="POST" class="d-inline">
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
