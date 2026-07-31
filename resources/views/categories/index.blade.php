<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watches List</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 15px;
            color: #333;
        }
        h2 {
            margin-bottom: 10px;
        }
        .add-btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .add-btn:hover {
            background: #1e4fc4;
        }
        .success-msg {
            background: #d1e7dd;
            color: #0f5132;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            min-width: 600px;
            border-collapse: collapse;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        thead {
            background: #f1f5f9;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        tbody tr:hover {
            background: #f9fafb;
        }
        img {
            border-radius: 6px;
            object-fit: cover;
        }
        .actions a {
            margin-right: 10px;
            text-decoration: none;
            color: #2563eb;
        }
        .actions form {
            display: inline;
        }
        .actions button {
            border: none;
            background: none;
            color: #dc2626;
            cursor: pointer;
            padding: 0;
            font-size: 14px;
        }
        .empty-row {
            text-align: center;
            color: #6b7280;
            padding: 20px;
        }

        /* Responsive : petits écrans (mobile) */
        @media (max-width: 600px) {
            body {
                margin: 20px auto;
            }
            h2 {
                font-size: 20px;
            }
            .add-btn {
                display: block;
                text-align: center;
            }
            th, td {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <h2>Categories List </h2>

    <a href="{{ route('categories.create') }}" class="add-btn">+ Add a Category</a>

    @if(session('success'))
        <div class="success-msg">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                      
                        <td>{{ $category->name }}</td>
                     
                        <td class="actions">
                            <a href="{{ route('categories.show', $category) }}">Show</a>
                            <a href="{{ route('categories.edit', $category) }}">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-row">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>