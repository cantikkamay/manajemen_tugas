@extends('layouts.main')

@section('content')
    <div class="text-center">
        <h1>404</h1>
        <p>Halaman yang Anda cari tidak ditemukan.</p>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Kembali ke Daftar Tugas</a>
    </div>
@endsection
