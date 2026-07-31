<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Details</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
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
        .card {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .card img {
            width: 100%;
            max-width: 300px;
            border-radius: 8px;
            display: block;
            margin-bottom: 20px;
        }
        .row {
            margin-bottom: 12px;
        }
        .row strong {
            display: inline-block;
            width: 120px;
        }
        .actions {
            margin-top: 20px;
        }
        .actions a {
            display: inline-block;
            margin-right: 10px;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
        }
        .edit-btn {
            background: #f59e0b;
            color: white;
        }
        .delete-btn {
            background: #dc2626;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            body {
                margin: 20px auto;
            }
            .card {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <h2>Category Details</h2>

    <a href="{{ route('categories.index') }}" class="back-link">← Back to list</a>

    
        <div class="row">
            <strong>Name:</strong> {{ $category->name }}
        </div>


        <div class="actions">
            <a href="{{ route('categories.edit', $category->id) }}" class="edit-btn">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this Category?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Delete</button>
            </form>
        </div>

    </div>

</body>
</html>