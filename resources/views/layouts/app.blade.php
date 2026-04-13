<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .input-group {
            display: flex;
            margin-bottom: 30px;
        }
        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
            cursor: pointer;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 12px;
            background: #f9f9f9;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }
        .task-text {
            flex: 1;
            font-size: 16px;
        }
        .completed {
            text-decoration: line-through;
            color: #888;
        }
        .checkbox {
            margin-right: 15px;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 3px;
            cursor: pointer;
        }
        form {
            display: inline;
        }
        .empty {
            text-align: center;
            color: #888;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>