<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watches Shop</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background: #fff;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 40px;
            border-bottom: 1px solid #e5e7eb;
        }
        nav .logo {
            font-weight: bold;
            font-size: 18px;
        }
        nav .links {
            display: flex;
            align-items: center;
        }
        nav .links a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }
        nav .links a:hover {
            color: #2563eb;
        }
        nav .links a.active {
            color: #2563eb;
            font-weight: bold;
        }
        nav .links form {
            display: inline;
        }
        nav .links button {
            background: none;
            border: none;
            color: #333;
            font-size: 14px;
            cursor: pointer;
            padding: 0;
            margin-left: 20px;
            font-family: inherit;
        }
        nav .links button:hover {
            color: #2563eb;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px 20px;
        }
        h1 {
            font-size: 26px;
            margin-bottom: 24px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: box-shadow 0.2s;
        }
        .card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: #f3f4f6;
        }
        .card-body {
            padding: 14px 16px;
            flex: 1;
        }
        .card-body h3 {
            margin: 0 0 6px 0;
            font-size: 16px;
        }
        .card-body p {
            margin: 0;
            font-size: 13px;
            color: #6b7280;
        }
        .card-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 16px;
            font-size: 13px;
            border-top: 1px solid #f3f4f6;
        }
        .badge {
            background: #16a34a;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        .price {
            background: #2563eb;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        .brand {
            background: #2563eb;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        .card-footer {
            padding: 8px 16px;
            font-size: 12px;
            color: #9ca3af;
            border-top: 1px solid #f3f4f6;
        }
        .view-btn {
            display: block;
            text-align: center;
            background: #2563eb;
            color: white;
            padding: 10px;
            font-size: 13px;
            text-decoration: none;
        }
        .view-btn:hover {
            background: #1e4fc4;
        }

        .see-all {
            text-align: center;
            margin-top: 30px;
        }
        .see-all a {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }
        .see-all a:hover {
            background: #1e4fc4;
        }

        .empty-msg {
            text-align: center;
            color: #6b7280;
            padding: 60px 0;
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 600px) {
            nav {
                padding: 14px 16px;
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            nav .links {
                flex-wrap: wrap;
            }
            nav .links a,
            nav .links button {
                margin-left: 0;
                margin-right: 16px;
            }
            .grid {
                grid-template-columns: 1fr;
            }
            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo">⌚ Watches Shop</div>
        <div class="links">
            <a href="{{ route('home') }}" class="active">Home</a>
            <a href="{{ route('categories') }}">Categories</a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ route('watches.index') }}">Dashboard</a>
                    <a href="{{ route('profile.edit') }}">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <div class="container">
        <h1>Last Watches</h1>

        @if($watches->count() > 0)
            <div class="grid">
                @foreach($watches as $watch)
                    <div class="card">
                        @if($watch->image)
                            <img src="{{ asset('storage/' . $watch->image) }}" alt="{{ $watch->model }}">
                        @else
                            <img src="https://via.placeholder.com/400x300?text=No+Image" alt="No image">
                        @endif

                        <div class="card-body">
                            <h3>{{ $watch->model }}</h3>
                            <p>{{ Str::limit($watch->description, 60) }}</p>
                        </div>

                        <div class="card-info">
                            <span>Stock: <span class="badge">{{ $watch->stock }}</span></span>
                            <span class="price">{{ $watch->price }} DH</span>
                        </div>

                        <div class="card-info">
                            <span>Brand:</span>
                            <span class="brand">{{ $watch->brand }}</span>
                        </div>

                        <div class="card-footer">
                            {{ $watch->created_at->format('Y-m-d H:i:s') }}
                        </div>

                        <a href="{{ route('watches.show', $watch->id) }}" class="view-btn">View Details</a>
                    </div>
                @endforeach
            </div>

            <div class="see-all">
                <a href="{{ route('categories') }}">See All Categories</a>
            </div>
        @else
            <div class="empty-msg">No watches available yet.</div>
        @endif
    </div>

</body>
</html>