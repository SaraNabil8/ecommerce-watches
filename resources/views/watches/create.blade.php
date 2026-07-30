<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Watch</title>
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
        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #1e4fc4;
        }

        /* Responsive : petits écrans (mobile) */
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

    <h2>Add a Watch</h2>

    <a href="{{ route('watches.index') }}" class="back-link">← Back to list</a>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('watches.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label>Model</label>
            <input type="text" name="model" value="{{ old('model') }}">
        </div>

        <div class="field">
            <label>Brand</label>
            <input type="text" name="brand" value="{{ old('brand') }}">
        </div>

<div class="field">
    <label>Price</label>
    <input type="number" step="0.01" min="0" name="price" value="{{ old('price') }}">
</div>

<div class="field">
    <label>Stock</label>
    <input type="number" min="0" name="stock" value="{{ old('stock') }}">
</div>

        <div class="field">
            <label>Description</label>
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="field">
            <label>Image</label>
            <input type="file" name="image">
        </div>

        <button type="submit">Save</button>

    </form>

</body>
</html>