<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password — D'Fourty</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: {
            paper: '#FFFFFF', ink: '#1E1E1E', 'ink-soft': '#5A5A5A',
            brick: '#6BBF3D', 'brick-dark': '#55A02E',
            leaf: '#5CB348', 'leaf-dark': '#3D8C2F',
        }, fontFamily: { display: ['Fraunces', 'serif'], body: ['Plus Jakarta Sans', 'sans-serif'] } } } }
    </script>
    <style>
        body { background-color: #FFFFFF; }
        a:focus-visible, button:focus-visible, input:focus-visible { outline: 2px solid #6BBF3D; outline-offset: 2px; }
    </style>
</head>
<body class="font-body text-ink antialiased min-h-screen flex items-center justify-center px-5">

    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <img src="{{ asset('storage/images/logo.png') }}" alt="Logo Karang Taruna D'Fourty" class="h-16 w-auto mx-auto mb-2">
            <p class="font-display text-3xl text-brick">D'Fourty</p>
            <p class="text-xs uppercase tracking-widest text-ink-soft mt-1">Panel Admin</p>
        </div>

        <div class="bg-white/60 border border-ink/10 rounded-sm p-7">
            <h1 class="font-display text-xl text-ink mb-1">Lupa Password</h1>
            <p class="text-sm text-ink-soft mb-5">Masukkan email admin, kami akan kirim link reset password.</p>

            @if (session('status'))
                <div class="mb-5 bg-leaf/10 border border-leaf/30 text-leaf-dark text-sm rounded-md px-4 py-3">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-5 bg-brick/10 border border-brick/30 text-brick-dark text-sm rounded-md px-4 py-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-xs uppercase tracking-widest text-ink-soft mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full rounded-md border border-ink/15 bg-paper px-3 py-2 text-sm">
                </div>
                <button type="submit" class="w-full rounded-md bg-brick text-white py-2.5 text-sm font-semibold hover:bg-brick-dark transition-colors">
                    Kirim Link Reset
                </button>
            </form>
        </div>

        <p class="text-center mt-6">
            <a href="{{ route('login') }}" class="text-sm text-ink-soft hover:text-brick">&larr; Kembali ke login</a>
        </p>
    </div>

</body>
</html>
