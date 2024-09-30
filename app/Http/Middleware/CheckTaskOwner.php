<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTaskOwner
{
    public function handle(Request $request, Closure $next)
    {
        $task = $request->route('task');
        
        // Pastikan user yang login adalah pemilik tugas
        if ($task->user_id !== auth()->id()) {
            return redirect()->route('tasks.index')->with('error', 'Tidak diizinkan');
        }

        return $next($request);
    }
}

