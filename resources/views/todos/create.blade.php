@extends('layouts.app')

@section('content')
    <h1>Add New Task</h1>

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Task Title *</label>
            <input type="text" name="task" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Description</label>
            <textarea name="description" rows="4" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
        </div>

        <button type="submit" style="background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Save Task</button>
        <a href="{{ route('todos.index') }}" style="background: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; margin-left: 10px;">Cancel</a>
    </form>
@endsection 