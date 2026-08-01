<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} Watches</title>
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
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #2563eb;
            text-decoration: none;
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
        .empty-row {
            text-align: center;
            color: #6b7280;
            padding: 20px;
        }

        @media (max-width: 600px) {
            body {
                margin: 20px auto;
            }
            h2 {
                font-size: 20px;
            }
            th, td {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <a href="{{ route('categories.index') }}" class="back-link">← Back to categories</a>

    <h2>{{ $category->name }} </h2>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($watches as $watch)
                    <tr>
                        <td>
                            @if($watch->image)
                                <img src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->model }}" width="60" height="60">
                            @else
                                —
                            @endif
                        </td>
                        <td>{{ $watch->model }}</td>
                        <td>{{ $watch->brand }}</td>
                        <td>{{ $watch->price }} DH</td>
                        <td>{{ $watch->stock }}</td>
                        <td class="actions">
                            <a href="{{ route('watches.show', $watch->id) }}">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-row">No watches in this category yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>