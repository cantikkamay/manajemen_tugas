@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

            <div class="form-group">
                <label for="title" class="font-weight-bold">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
            </div>

            <div class="form-group">
                <label for="description" class="font-weight-bold">Description</label>
                <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="due_date" class="font-weight-bold">Due Date</label>
                <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
            </div>

            <div class="form-group">
                <label for="status" class="font-weight-bold">Status</label>
                <select name="status" class="form-control" required>
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <label for="category_id">Kategori</label>
        <select name="category_id" id="category_id" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

            <button type="submit" class="btn btn-success">Update Task</button>
        </form>
    </div>
@endsection
