<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Kasir</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #0d1528;
            color: #e8edf7;
        }
        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .card {
            width: 100%;
            max-width: 260px;
            background: #121d31;
            border: 1px solid #1d2a42;
            border-radius: 4px;
            box-shadow: 0 18px 48px rgba(4, 8, 18, 0.32);
            padding: 14px 26px 18px;
        }
        h1 {
            margin: 0 0 10px;
            text-align: center;
            font-size: 14px;
            line-height: 1.25;
            font-weight: 700;
        }
        .brand {
            text-align: center;
            margin-bottom: 8px;
            color: #f4f7fb;
            font-size: 11px;
            font-weight: 700;
        }
        .field {
            margin-bottom: 8px;
        }
        .field label {
            display: block;
            font-size: 9px;
            font-weight: 700;
            margin-bottom: 4px;
            color: #cbd5e1;
        }
        .field input {
            width: 100%;
            height: 28px;
            padding: 5px 9px;
            border-radius: 3px;
            border: 1px solid #29364c;
            background: #1a2538;
            color: #f8fafc;
            font-size: 12px;
            outline: none;
        }
        .field input:focus {
            border-color: #ea9b22;
            box-shadow: 0 0 0 1px rgba(234, 155, 34, 0.22);
        }
        .password-wrap {
            position: relative;
        }
        .password-wrap input {
            padding-right: 64px;
        }
        .password-tools {
            position: absolute;
            right: 7px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            gap: 7px;
            align-items: center;
        }
        .icon-button {
            width: 20px;
            height: 20px;
            border: 0;
            padding: 0;
            background: transparent;
            color: #93a4bd;
            cursor: pointer;
            font-size: 13px;
            line-height: 20px;
        }
        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            margin: 6px 0 10px;
            color: #b9c4d5;
            font-size: 11px;
        }
        .remember input {
            width: 12px;
            height: 12px;
            accent-color: #e89b21;
        }
        .error {
            color: #fda4af;
            margin: 0 0 10px;
            font-size: 11px;
        }
        .btn {
            width: 100%;
            height: 28px;
            border: none;
            background: #e89b21;
            color: #fff;
            border-radius: 3px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }
        .btn:hover { background: #f0a52b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="brand">Laravel</div>
            <h1>Sign in</h1>

            @if($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="field">
                    <label for="email">Email address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@gmail.com" required>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="password-wrap">
                        <input type="password" id="password" name="password" value="" required>
                        <div class="password-tools">
                            <button class="icon-button" type="button" id="togglePassword" title="Tampilkan password" aria-label="Tampilkan password">◉</button>
                            <button class="icon-button" type="button" title="Pengaturan" aria-label="Pengaturan">⚙</button>
                        </div>
                    </div>
                </div>

                <label class="remember">
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>

                <button type="submit" class="btn">Sign in</button>
            </form>
        </div>
    </div>
    <script>
        const password = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        togglePassword.addEventListener('click', () => {
            const show = password.type === 'password';
            password.type = show ? 'text' : 'password';
            togglePassword.textContent = show ? '○' : '◉';
            togglePassword.setAttribute('title', show ? 'Sembunyikan password' : 'Tampilkan password');
        });
    </script>
</body>
</html>
