<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📓 আমার নোটবুক</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
        }

        nav {
            background: #2c3e50;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a.brand {
            color: white;
            text-decoration: none;
            font-size: 22px;
            font-weight: bold;
        }

        nav a.btn-nav {
            background: #f39c12;
            color: white;
            padding: 8px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 15px;
        }

        nav a.btn-nav:hover { background: #e67e22; }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('notes.index') }}" class="brand">📓 আমার নোটবুক</a>
    <a href="{{ route('notes.create') }}" class="btn-nav">➕ নতুন নোট</a>
</nav>

<div class="container">
    @if(session('success'))
        <div class="success">✅ {{ session('success') }}</div>
    @endif

    @yield('content')
</div>

    {{-- footer code can be added here if needed --}}

    <footer style="
    background: #2c3e50; 
    padding: 20px 0; 
    text-align: center;
    color: white;
    
    ">
        <p class="text-center text-muted">&copy; 2026 আমার নোটবুক. সব অধিকার সংরক্ষিত.</p>
    </footer>

</body>
</html>