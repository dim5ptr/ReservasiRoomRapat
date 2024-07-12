@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ruang List</h2>
    <a href="{{ route('ruang.create') }}" class="btn btn-primary">Add Ruang</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kapasitas</th>
                <th>Harga</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang as $ruang)
                <tr>
                    <td>{{ $ruang->id }}</td>
                    <td>{{ $ruang->nama }}</td>
                    <td>{{ $ruang->kapasitas }}</td>
                    <td>{{ $ruang->harga }}</td>
                    <td>
                        <a href="{{ route('ruang.edit', $ruang->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('ruang.destroy', $ruang->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
