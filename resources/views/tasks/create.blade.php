@extends('layouts.main')

@section('title', 'Buat Tugas Baru')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Buat Tugas Baru</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="p-4 bg-light rounded shadow">
            @csrf
            <div class="form-group">
                <label for="title" class="font-weight-bold">Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description" class="font-weight-bold">Deskripsi</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="due_date" class="font-weight-bold">Tanggal Selesai</label>
                <input type="date" name="due_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status" class="font-weight-bold">Status</label>
                <select name="status" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <label for="category_id">Kategori</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
