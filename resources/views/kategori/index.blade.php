@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Kategori</h1>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->nama }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
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
