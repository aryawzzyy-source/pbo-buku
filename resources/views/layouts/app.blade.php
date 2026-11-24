<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Manajemen Buku')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; color: #222; }
        header { background: #12365f; color: #fff; padding: 14px 24px; }
        nav a { color: #fff; margin-right: 16px; text-decoration: none; }
        main { max-width: 960px; margin: 24px auto; background: #fff; padding: 24px; border-radius: 8px; }
        footer { text-align: center; color: #777; padding: 16px; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #e8eef5; }
        .ok { background: #d9f2e0; padding: 10px; border-radius: 4px; }
        .err { background: #fadada; padding: 10px; border-radius: 4px; }
        .kesalahan { color: #b00020; font-size: 13px; }
        input, select { padding: 6px; width: 100%; max-width: 360px; }
        .btn { padding: 6px 12px; cursor: pointer; }
    </style>
</head>
<body>
    <header>
        <h2 style="margin:0 0 8px">@yield('judul_halaman', 'Sistem Manajemen Buku')</h2>
        <nav>
            <a href="{{ route('buku.index') }}">Daftar Buku</a>
            <a href="{{ route('buku.create') }}">Tambah Buku</a>
        </nav>
    </header>

    <main>
        @if (session('status'))
            <p class="ok">{{ session('status') }}</p>
        @endif
        @if (session('error'))
            <p class="err">{{ session('error') }}</p>
        @endif

        @yield('content')
    </main>

    <footer>Ujian Tengah Semester PBO &bull; Universitas Catur Insan Cendekia</footer>
</body>
</html>