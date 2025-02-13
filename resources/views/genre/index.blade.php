<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Genre</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Genre</h2>

        <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Tambah Genre</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $index => $genre)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus genre ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
