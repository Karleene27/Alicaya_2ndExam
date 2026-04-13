<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|min:3'
        ]);

        Todo::create([
            'task' => $request->task,
            'description' => $request->description,
            'completed' => false
        ]);

        return redirect()->route('todos.index')->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|min:3'
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update([
            'task' => $request->task,
            'description' => $request->description,
            'completed' => $request->has('completed')
        ]);

        return redirect()->route('todos.index')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Task deleted successfully!');
    }

    public function toggle($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        return redirect()->route('todos.index')->with('success', 'Task status updated!');
    }
}