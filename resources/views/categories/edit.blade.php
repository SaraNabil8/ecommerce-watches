<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Watch</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            padding: 0 15px;
            color: #333;
        }
        h2 {
            margin-bottom: 10px;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #2563eb;
            text-decoration: none;
        }
        .error-box {
            background: #f8d7da;
            color: #842029;
            padding: 12px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }
        form {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .field {
            margin-bottom: 16px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            font-size: 14px;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            font-size: 14px;
        }
        textarea {
            resize: vertical;
        }
        .current-image img {
            width: 100px;
            border-radius: 6px;
            margin-bottom: 10px;
            display: block;
        }
        button {
            background: #f59e0b;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #d97f06;
        }

        @media (max-width: 600px) {
            body {
                margin: 20px auto;
            }
            h2 {
                font-size: 20px;
            }
            form {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <h2>Edit Category</h2>

    <a href="{{ route('categories.index') }}" class="back-link">← Back to list</a>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="field">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}">
        </div>

    
        <button type="submit">Update</button>

    </form>

</body>
</html>