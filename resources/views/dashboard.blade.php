<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Laravel</title>
    <style>
        * { box-sizing: border-box; }
        html, body { margin: 0; min-width: 320px; min-height: 100%; }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #111827;
            color: #d1d5db;
        }
        .layout {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 236px minmax(0, 1fr);
        }
        .sidebar {
            min-height: 100vh;
            background: #101827;
            border-right: 1px solid #263244;
        }
        .brand {
            height: 50px;
            display: flex;
            align-items: center;
            padding: 0 18px;
            border-bottom: 1px solid #263244;
            color: #f8fafc;
            font-size: 15px;
            font-weight: 800;
        }
        .nav { padding: 14px 17px; }
        .nav-link {
            height: 36px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 8px;
            border-radius: 5px;
            color: #d7dce5;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
        }
        .nav-link.active {
            background: #242f40;
            color: #ffc400;
        }
        .nav-icon {
            width: 18px;
            height: 18px;
            flex: none;
        }
        .main { min-width: 0; }
        .topbar {
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px 0 13px;
            border-bottom: 1px solid #263244;
            background: #111827;
        }
        .topbar-spacer { width: 30px; }
        .user-menu {
            width: 30px;
            height: 30px;
            display: grid;
            place-items: center;
            border: 0;
            border-radius: 50%;
            background: #3f51c9;
            color: #fff;
            font-size: 12px;
            font-weight: 800;
        }
        .content {
            min-height: 490px;
            padding: 16px 18px 36px;
            background: #1b2638;
        }
        .page-title {
            margin: 0 0 16px;
            color: #f1f5f9;
            font-size: 22px;
            line-height: 1.2;
        }
        .widgets {
            display: grid;
            grid-template-columns: minmax(280px, 335px) minmax(180px, 220px) minmax(340px, 405px);
            gap: 14px;
        }
        .widget {
            height: 92px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px;
            border: 1px solid #28364a;
            border-radius: 8px;
            background: #1a2638;
            box-shadow: 0 7px 18px rgba(5, 10, 20, 0.08);
        }
        .avatar {
            width: 36px;
            height: 36px;
            display: grid;
            flex: none;
            place-items: center;
            border-radius: 50%;
            background: #38485f;
            color: #dbe6f4;
            font-size: 14px;
            font-weight: 800;
        }
        .widget-copy { min-width: 0; line-height: 1.25; }
        .widget-title {
            color: #f1f5f9;
            font-size: 12px;
            font-weight: 800;
        }
        .widget-subtitle {
            color: #c8d1df;
            font-size: 11px;
        }
        .widget-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            align-self: flex-start;
        }
        .signout {
            height: 30px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            border: 1px solid #304058;
            border-radius: 5px;
            background: #263449;
            color: #dbe4ef;
            font-size: 10px;
            font-weight: 700;
            padding: 0 9px;
            cursor: pointer;
        }
        .brand-card {
            color: #f3f6fb;
            font-style: italic;
            font-size: 16px;
            font-weight: 800;
        }
        .brand-version {
            margin-top: 3px;
            font-size: 9px;
            font-style: normal;
            font-weight: 400;
            color: #cbd5e1;
        }
        .links-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .top-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            color: #edf3fb;
            text-decoration: none;
            font-size: 10px;
            font-weight: 800;
        }
        .top-link svg { width: 17px; height: 17px; }
        .table-section {
            width: 100vw;
            background: #111827;
            border-top: 1px solid #263244;
            padding: 24px 18px 28px;
            margin-left: -236px;
        }
        .table-toolbar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 12px;
        }
        .search-box {
            width: 254px;
            height: 38px;
            display: flex;
            align-items: center;
            gap: 9px;
            border: 1px solid #39465a;
            border-radius: 8px;
            background: #1a2638;
            color: #aab6c7;
            padding: 0 12px;
        }
        .search-box svg { width: 16px; height: 16px; flex: none; }
        .search-box input {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            color: #dce5f1;
            font-size: 12px;
        }
        .search-box input::placeholder { color: #aab6c7; }
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }
        th {
            height: 54px;
            border-bottom: 1px solid #344157;
            color: #f1f5f9;
            font-size: 12px;
            font-weight: 800;
            text-align: left;
        }
        td {
            height: 58px;
            border-bottom: 1px solid #344157;
            color: #dfe6ef;
            font-size: 12px;
            font-weight: 600;
        }
        th:nth-child(1), td:nth-child(1) { width: 92px; text-align: center; }
        th:nth-child(2), td:nth-child(2) { width: 18%; }
        th:nth-child(3), td:nth-child(3) { width: 19%; }
        th:nth-child(4), td:nth-child(4) { width: 17%; }
        th:nth-child(5), td:nth-child(5) { width: 13%; }
        th:nth-child(6), td:nth-child(6) { width: 22%; text-align: right; padding-right: 14px; }
        .checkbox {
            width: 16px;
            height: 16px;
            border: 1px solid #69758a;
            border-radius: 3px;
            margin: 0 auto;
        }
        .price { color: #edf2f7; }
        .actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 14px;
        }
        .action {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            border: 0;
            background: transparent;
            color: #f9ce35;
            font-size: 11px;
            font-weight: 800;
            text-decoration: none;
            padding: 0;
            cursor: pointer;
        }
        .action.delete { color: #fb6578; }
        .action svg { width: 13px; height: 13px; }
        .table-footer {
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #edf2f7;
            font-size: 13px;
            font-weight: 800;
        }
        .per-page {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .per-page select {
            width: 70px;
            height: 34px;
            border: 1px solid #39465a;
            border-radius: 7px;
            background: #1a2638;
            color: #edf2f7;
            padding: 0 8px;
        }
        @media (max-width: 900px) {
            .layout { grid-template-columns: 188px minmax(0, 1fr); }
            .widgets { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .content { min-height: 650px; }
            .table-section { margin-left: -188px; }
        }
        @media (max-width: 620px) {
            .layout { grid-template-columns: 58px minmax(0, 1fr); }
            .brand { padding: 0 8px; font-size: 10px; }
            .nav { padding: 14px 7px; }
            .nav-link { justify-content: center; padding: 0; }
            .nav-link span { display: none; }
            .widgets { grid-template-columns: 1fr; }
            .search-box { width: 180px; }
            .table-section { margin-left: -58px; }
        }
    </style>
</head>
<body>
    @php
        $name = auth()->user()->name ?? 'Administrator';
        $initial = strtoupper(substr($name, 0, 1));
    @endphp

    <div class="layout">
        <aside class="sidebar">
            <div class="brand">Laravel</div>
            <nav class="nav">
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="#f5cf3b" stroke-width="1.8">
                        <path d="M3 11.5 12 4l9 7.5"/><path d="M5.5 10v9h13v-9M9.5 19v-5h5v5"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="#d9e1ec" stroke-width="1.6">
                        <rect x="3" y="7" width="18" height="13" rx="3"/><path d="M3 11h18M8 7V5m8 2V5"/>
                    </svg>
                    <span>Categories</span>
                </a>
                <a class="nav-link" href="{{ route('products.index') }}">
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="#d9e1ec" stroke-width="1.6">
                        <rect x="3" y="7" width="18" height="13" rx="3"/><path d="M3 11h18M8 7V5m8 2V5"/>
                    </svg>
                    <span>Products</span>
                </a>
            </nav>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="topbar-spacer"></div>
                <button class="user-menu" type="button" title="{{ $name }}">{{ $initial }}</button>
            </header>

            <section class="content">
                <h1 class="page-title">Dashboard</h1>
                <div class="widgets">
                    <article class="widget">
                        <div class="avatar">{{ $initial }}</div>
                        <div class="widget-copy">
                            <div class="widget-title">Welcome</div>
                            <div class="widget-subtitle">{{ $name }}</div>
                        </div>
                        <div class="widget-actions">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="signout" type="submit">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M10 5H5v14h5M14 8l4 4-4 4M18 12H8"/>
                                    </svg>
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </article>

                    <article class="widget" style="justify-content:center;">
                        <div class="brand-card">
                            Filament
                            <div class="brand-version">v3.3.37</div>
                        </div>
                    </article>

                    <article class="widget links-card">
                        <a class="top-link" href="https://filamentphp.com/docs" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 5h6a3 3 0 0 1 3 3v11H7a3 3 0 0 1-3-3V5Zm16 0h-4a3 3 0 0 0-3 3v11h4a3 3 0 0 0 3-3V5Z"/></svg>
                            Documentation
                        </a>
                        <a class="top-link" href="https://github.com/filamentphp/filament" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-3.16 19.49c.5.09.68-.22.68-.48v-1.86c-2.78.61-3.37-1.18-3.37-1.18-.45-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.61.07-.61 1 .07 1.53 1.03 1.53 1.03.9 1.53 2.35 1.09 2.92.83.09-.65.35-1.09.64-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.09.39-1.98 1.03-2.68-.1-.25-.45-1.27.1-2.64 0 0 .84-.27 2.75 1.02A9.58 9.58 0 0 1 12 6.3c.85 0 1.71.11 2.51.34 1.91-1.29 2.75-1.02 2.75-1.02.55 1.37.2 2.39.1 2.64.64.7 1.03 1.59 1.03 2.68 0 3.84-2.34 4.69-4.57 4.94.36.31.68.92.68 1.86V21c0 .27.18.58.69.48A10 10 0 0 0 12 2Z"/></svg>
                            GitHub
                        </a>
                    </article>

                </div>
            </section>

            <section class="table-section">
                <div class="table-toolbar">
                    <label class="search-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="6"/><path d="m16 16 5 5"/></svg>
                        <input id="product-search" type="search" placeholder="Search">
                    </label>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="product-table">
                            @forelse ($latestProducts as $product)
                                <tr>
                                    <td>
                                        @if($product->image)
                                            <div class="checkbox" style="background:url('{{ asset('storage/' . $product->image) }}') center/cover no-repeat;"></div>
                                        @else
                                            <div class="checkbox"></div>
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category?->name ?? '-' }}</td>
                                    <td class="price">IDR {{ number_format($product->price, 2, ',', '.') }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <div class="actions">
                                            <a class="action" href="{{ route('products.edit', $product) }}">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m4 20 4.5-1 10-10-3.5-3.5-10 10L4 20Zm9.5-13 3.5 3.5"/></svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="action delete" type="submit">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M9 7V4h6v3m-8 0 1 13h8l1-13M10 11v5m4-5v5"/></svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align:center;color:#94a3b8;">Tidak ada produk</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span>Showing 1 {{ $latestProducts->count() ? 'result' : 'result' }}</span>
                    <label class="per-page">
                        <span>Per page</span>
                        <select aria-label="Per page">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                        </select>
                    </label>
                </div>
            </section>
        </main>
    </div>

    <script>
        const search = document.getElementById('product-search');
        search.addEventListener('input', () => {
            const query = search.value.toLowerCase();
            document.querySelectorAll('#product-table tr').forEach((row) => {
                row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
