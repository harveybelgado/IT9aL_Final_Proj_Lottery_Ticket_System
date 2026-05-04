<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotto System - Premium Experience</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary: #64748b;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --radius: 12px;
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        }

        * { box-sizing: border-box; }
        body { 
            font-family: 'Outfit', sans-serif; 
            margin: 0; 
            padding: 0; 
            background: var(--bg); 
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
        }

        header { 
            background: #ffffff; 
            color: var(--text); 
            padding: 1rem 2rem; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--border);
            box-shadow: var(--shadow);
        }

        .logo { font-weight: 700; font-size: 1.5rem; letter-spacing: -0.025em; color: var(--primary); }
        .role-badge { 
            background: #eff6ff; 
            color: var(--primary); 
            padding: 0.25rem 0.75rem; 
            border-radius: 9999px; 
            font-size: 0.75rem; 
            font-weight: 600;
            text-transform: uppercase;
            border: 1px solid #dbeafe;
            margin-left: 0.5rem;
        }

        nav { display: flex; align-items: center; gap: 1.5rem; }
        nav a { 
            color: var(--text-muted); 
            text-decoration: none; 
            font-weight: 500; 
            font-size: 0.95rem;
            transition: all 0.2s;
        }
        nav a:hover { color: var(--primary); }

        .container { 
            padding: 2rem; 
            max-width: 1100px; 
            margin: 2rem auto; 
            background: var(--card-bg); 
            border-radius: var(--radius); 
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
        }

        h1, h2, h3 { margin-top: 0; color: var(--text); font-weight: 600; letter-spacing: -0.025em; }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.6rem 1.25rem;
            font-size: 0.95rem;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            border: none;
            gap: 0.5rem;
        }

        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-hover); }

        .btn-success { background: #10b981; color: white; }
        .btn-success:hover { background: #059669; }

        .btn-outline { background: transparent; border: 1px solid var(--border); color: var(--text); }
        .btn-outline:hover { background: #f8fafc; border-color: #cbd5e1; }

        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }

        .btn-block { width: 100%; }

        table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 1.5rem; border: 1px solid var(--border); border-radius: 8px; overflow: hidden; }
        th { background: #f8fafc; padding: 1rem; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; color: var(--text-muted); border-bottom: 1px solid var(--border); text-align: left; }
        td { padding: 1rem; border-bottom: 1px solid var(--border); font-size: 0.95rem; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f8fafc; }

        .alert { 
            padding: 1rem 1.25rem; 
            margin-bottom: 1.5rem; 
            border-radius: 8px; 
            font-weight: 500; 
            display: flex; 
            align-items: center; 
            gap: 0.75rem;
            border: 1px solid transparent;
        }
        .alert-success { background: #f0fdf4; color: #166534; border-color: #bbf7d0; }
        .alert-danger { background: #fef2f2; color: #991b1b; border-color: #fecaca; }

        .card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid var(--border);
            transition: all 0.2s;
        }
        .card:hover { border-color: #cbd5e1; box-shadow: var(--shadow); }

        form { display: flex; flex-direction: column; gap: 1.25rem; }
        .form-group { display: flex; flex-direction: column; gap: 0.5rem; }
        label { font-size: 0.9rem; font-weight: 500; color: var(--text); }
        input, select, textarea { 
            padding: 0.75rem; 
            font-size: 1rem; 
            border: 1px solid var(--border); 
            border-radius: 8px; 
            font-family: inherit;
            transition: border-color 0.2s, box-shadow 0.2s;
            background: #ffffff;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .flex-between { display: flex; justify-content: space-between; align-items: center; }
        .mt-4 { margin-top: 1rem; }
        .gap-2 { gap: 0.5rem; }
        .w-full { width: 100%; }
    </style>
</head>
<body>
    @auth
    <header>
        <div class="logo">
            LottoSystem<span class="role-badge">{{ auth()->user()->role }}</span>
        </div>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('users.index') }}">Users</a>
            @elseif(auth()->user()->role === 'staff')
                <a href="{{ route('users.create') }}">Register</a>
            @endif
            <a href="{{ route('tickets.index') }}">Tickets</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('draws.index') }}">Draws</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" style="margin:0; padding:0; display:inline;">
                @csrf
                <button type="submit" class="btn btn-outline" style="padding: 0.4rem 0.8rem; font-size: 0.85rem;">Logout</button>
            </form>
        </nav>
    </header>
    @endauth

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                <ul style="margin:0; padding-left:20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>

