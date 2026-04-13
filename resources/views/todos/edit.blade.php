@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Task Title *</label>
            <input type="text" name="task" value="{{ $todo->task }}" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Description</label>
            <textarea name="description" rows="4" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">{{ $todo->description }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <input type="checkbox" name="completed" {{ $todo->completed ? 'checked' : '' }}>
            <label style="display: inline; margin-left: 5px;">Mark as Completed</label>
        </div>

        <button type="submit" style="background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Update Task</button>
        <a href="{{ route('todos.index') }}" style="background: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; margin-left: 10px;">Cancel</a>
    </form>
@endsection