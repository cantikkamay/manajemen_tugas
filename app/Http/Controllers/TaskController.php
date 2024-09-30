<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Category; 


class TaskController extends Controller
{
    // Menampilkan semua tugas
    public function index()
    {
        $tasks = Task::all(); // Ambil semua tugas
        $categories = Category::all(); // Ambil semua kategori (jika diperlukan)
        return view('tasks.index', compact('tasks', 'categories')); // Kirim kedua variabel ke view
    }

    // Menampilkan form untuk membuat tugas baru
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('tasks.create', compact('categories')); // Kirim kategori ke view
    }

    // Menyimpan tugas baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,completed',
            // 'user_id' => 'nullable|exists:users,id', // Jika Anda ingin mengaitkan dengan pengguna
        ]);

        // Menyimpan tugas baru tanpa user_id
        Task::create($request->except('user_id')); // atau biarkan saja jika user_id tidak ada di request

        // Redirect ke index tugas dengan pesan sukses
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dibuat.');
    }


    // Menampilkan detail tugas
    // Menampilkan detail tugas
    public function show(Task $task)
    {
        return view('tasks.show', compact('task')); // Mengirim data tugas ke view show
    }

    // Menampilkan form untuk mengedit tugas
    public function edit(Task $task)
    {
        $categories = Category::all();  
        return view('tasks.edit', compact('task', 'categories')); // Cukup gunakan $task
    }

    // Memperbarui tugas
    public function update(Request $request, Task $task)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,completed',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Memperbarui tugas tanpa `user_id`
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        $task->update($request->all());

        // Redirect ke index tugas dengan pesan sukses
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    // Menghapus tugas
    public function destroy(Task $task)
    {
        $task->delete(); // Menghapus tugas
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus.');
    }

    public function showByCategory(Category $category)
    {
        $tasks = $category->tasks; // Ambil semua tugas berdasarkan kategori
        return view('tasks.index', compact('tasks'));
    }

    public function tasksByCategory(Category $category)
    {
        $tasks = $category->tasks; // Mengambil semua task di kategori tertentu
        return view('tasks.index', compact('tasks', 'category'));
    }

}
