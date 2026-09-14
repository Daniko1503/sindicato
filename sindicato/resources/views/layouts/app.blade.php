<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Painel S.F.P.C.A.E.M.P.</title>
    
    <!-- Bootstrap 5 CSS via CDN -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; color: #fff !important; }
        .bg-sindicato { background-color: #0d3b66 !important; }
    </style>
</head>
<body>

    <!-- Barra de Navegação do Painel Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-sindicato shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">S.F.P.C.A.E.M.P. Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">📊 Painel Geral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.alerta') }}">📝 Gerenciar Alerta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="{{ url('/') }}" target="_blank">👁️ Ver Site Público</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Dinâmico das Páginas -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap 5 JS via CDN -->
    <script src="https://jsdelivr.net"></script>
</body>
</html>
