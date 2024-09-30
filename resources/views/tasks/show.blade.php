@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">{{ $task->title }}</h1>
        
        <div class="card p-4 shadow">
            <div class="card-body">
                <h5 class="card-title">Deskripsi</h5>
                <p class="card-text">{{ $task->description }}</p>
                
                <h5 class="card-title">Status</h5>
                <p class="card-text">{{ $task->status }}</p>
                
                <h5 class="card-title">Tanggal Selesai</h5>
                <p class="card-text">{{ $task->due_date }}</p>
                
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
