@extends('layouts.app')

@section('content')
    <h1>My Todo List</h1>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('todos.create') }}" style="display: inline-block; background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">
        + Add New Task
    </a>

    @if($todos->isEmpty())
        <div style="text-align: center; color: #888; padding: 40px;">No tasks yet. Create your first task!</div>
    @else
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="padding: 10px; background: #f8f9fa; border-bottom: 2px solid #ddd;">Status</th>
                    <th style="padding: 10px; background: #f8f9fa; border-bottom: 2px solid #ddd;">Task</th>
                    <th style="padding: 10px; background: #f8f9fa; border-bottom: 2px solid #ddd;">Description</th>
                    <th style="padding: 10px; background: #f8f9fa; border-bottom: 2px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                <tr>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                        <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" style="background: none; border: none; cursor: pointer; font-size: 20px;">
                                {{ $todo->completed ? '✅' : '⬜' }}
                            </button>
                        </form>
                    </td>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                        <span style="{{ $todo->completed ? 'text-decoration: line-through; color: #888;' : '' }}">
                            {{ $todo->task }}
                        </span>
                    </td>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                        {{ $todo->description ?? '-' }}
                    </td>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                        <a href="{{ route('todos.edit', $todo->id) }}" style="background: #ffc107; color: #333; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-right: 5px;">Edit</a>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;" onclick="return confirm('Delete this task?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection