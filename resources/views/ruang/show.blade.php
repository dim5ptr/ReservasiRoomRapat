@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ruang Details</h2>

    <div class="card">
        <div class="card-header">
            {{ $ruang->nama }}
        </div>
        <div class="card-body">
            <p><strong>Kapasitas:</strong> {{ $ruang->kapasitas }}</p>
            <p><strong>Harga:</strong> {{ $ruang->harga }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('ruang.edit', $ruang->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('ruang.destroy', $ruang->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
