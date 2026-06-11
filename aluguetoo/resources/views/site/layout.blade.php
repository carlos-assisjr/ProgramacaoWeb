<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlugueToo - Aluguel de Equipamentos</title>
    <!-- Google Fonts - Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Premium Custom Styles -->
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-light: rgba(79, 70, 229, 0.08);
            --primary-light-hover: rgba(79, 70, 229, 0.15);
            --secondary: #06b6d4;
            --dark-main: #0f172a;
            --text-muted: #64748b;
            --bg-body: #f8fafc;
            --card-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.04), 0 1px 3px rgba(0, 0, 0, 0.02);
            --card-shadow-hover: 0 20px 40px -15px rgba(79, 70, 229, 0.12), 0 1px 10px rgba(0, 0, 0, 0.04);
            --border-color: #e2e8f0;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--dark-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            position: relative;
        }
        /* Ambient background glow elements for premium look */
        body::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.05) 0%, rgba(255, 255, 255, 0) 70%);
            top: 10%;
            left: -100px;
            z-index: -1;
            pointer-events: none;
        }
        body::after {
            content: "";
            position: absolute;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.04) 0%, rgba(255, 255, 255, 0) 70%);
            bottom: 15%;
            right: -150px;
            z-index: -1;
            pointer-events: none;
        }
        main {
            flex: 1;
            position: relative;
            z-index: 1;
        }
        /* Sticky Glassmorphism Navbar */
        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            min-height: 80px;
            transition: all 0.3s ease;
        }
        .logo-text {
            font-size: 26px;
            font-weight: 800;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            letter-spacing: -0.5px;
        }
        .logo-text span:first-child {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .logo-text span:last-child {
            color: var(--dark-main);
        }
        .logo-icon-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 10px;
            color: white;
            font-size: 18px;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }
        .menu-link {
            position: relative;
            padding: 8px 16px !important;
            margin-left: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-muted) !important;
            text-decoration: none;
            border-radius: var(--radius-sm);
            transition: all 0.25s ease;
        }
        .menu-link:hover {
            color: var(--primary) !important;
            background-color: var(--primary-light);
        }
        .menu-link.active {
            color: var(--primary) !important;
            background-color: var(--primary-light);
        }
        /* Cart Button Custom Styling */
        .cart-btn {
            position: relative;
            color: var(--primary);
            background-color: var(--primary-light);
            border: 1px solid rgba(79, 70, 229, 0.15);
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .cart-btn:hover {
            background-color: var(--primary);
            color: #fff;
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(79, 70, 229, 0.2);
        }
        .cart-btn:active {
            transform: translateY(0);
        }
        /* User Circle Action Icon */
        .user-icon {
            font-size: 26px;
            color: var(--dark-main);
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.25s ease;
            background-color: #f1f5f9;
            width: 44px;
            height: 44px;
        }
        .user-icon:hover {
            color: var(--primary);
            background-color: var(--primary-light);
            transform: scale(1.05);
        }
        /* Premium Dropdown Styling */
        .dropdown-menu {
            border: 1px solid rgba(226, 232, 240, 0.8) !important;
            box-shadow: 0 15px 35px -5px rgba(15, 23, 42, 0.08), 0 5px 15px -5px rgba(15, 23, 42, 0.03) !important;
            padding: 10px !important;
            margin-top: 12px !important;
            min-width: 220px;
        }
        .dropdown-item {
            padding: 10px 16px !important;
            border-radius: 8px !important;
            font-size: 14px;
            font-weight: 500;
            color: var(--dark-main);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .dropdown-item i {
            font-size: 16px;
            color: var(--text-muted);
            transition: all 0.2s ease;
        }
        .dropdown-item:hover {
            background-color: var(--primary-light) !important;
            color: var(--primary) !important;
        }
        .dropdown-item:hover i {
            color: var(--primary);
        }
        .dropdown-item-text {
            padding: 8px 16px !important;
            font-size: 14px;
            color: var(--dark-main);
        }
        /* Alerts Styling */
        .custom-alert {
            border: none;
            border-radius: var(--radius-md);
            padding: 16px 20px;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideDown 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .custom-alert-success {
            background-color: #ecfdf5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }
        .custom-alert-danger {
            background-color: #fef2f2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }
        .custom-alert-icon {
            font-size: 20px;
            flex-shrink: 0;
        }
        /* Container for dashboards/content */
        .dashboard-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        /* Modernized Transition Hover Card (useful across yield contents) */
        .transition-hover {
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid var(--border-color);
            background: #fff;
            border-radius: var(--radius-md);
            box-shadow: var(--card-shadow);
        }
        .transition-hover:hover {
            transform: translateY(-6px);
            box-shadow: var(--card-shadow-hover) !important;
            border-color: rgba(79, 70, 229, 0.15);
        }
        /* Carousel images update */
        .carousel-img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: var(--radius-md);
        }
        /* Premium Footer */
        footer {
            background: #ffffff;
            border-top: 1px solid var(--border-color);
            padding: 40px 0 30px;
            margin-top: 80px;
            font-size: 14px;
            color: var(--text-muted);
        }
        .footer-logo {
            font-size: 20px;
            font-weight: 800;
            text-decoration: none;
            margin-bottom: 15px;
            display: inline-block;
        }
        .footer-logo span:first-child {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .footer-logo span:last-child {
            color: var(--dark-main);
        }
        .footer-link {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .footer-link:hover {
            color: var(--primary);
        }
        .footer-social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #f1f5f9;
            color: var(--text-muted);
            margin-right: 8px;
            transition: all 0.2s ease;
        }
        .footer-social-icon:hover {
            background-color: var(--primary);
            color: #fff;
            transform: translateY(-2px);
        }
        /* Keyframes */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        /* Responsive Navbar Tweak */
        @media (max-width: 991.98px) {
            .navbar-custom {
                padding: 12px 0;
            }
            .menu-link {
                margin: 6px 0;
                padding: 10px 15px !important;
            }
            .navbar-nav.ms-auto {
                flex-direction: row;
                gap: 15px;
                padding-top: 15px;
                border-top: 1px solid var(--border-color);
                margin-top: 12px;
                width: 100%;
                justify-content: space-between;
            }
            .navbar-nav.ms-auto .dropdown-menu {
                position: absolute;
                right: 0;
                left: auto;
            }
        }
    </style>
</head>
<body>
    <!-- Premium Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand logo-text" href="{{ url('/') }}">
                <div class="logo-icon-wrapper">
                    <i class="bi bi-box-seam-fill"></i>
                </div>
                <span>AlugueToo</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center me-auto">
                    @auth
                    @if(auth()->user()->role === 'ADM')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('/dashboard.adm') }}">
                            <i class="bi bi-grid-1x2-fill me-1"></i> Dashboard
                        </a>
                    </li>
                    @endif
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto align-items-center flex-row gap-2 gap-lg-3">
                    @auth
                    @if(auth()->user()->role === 'CLI')
                    <li class="nav-item">
                        <a class="btn cart-btn rounded-circle" href="{{ url('/carrinho') }}" title="Carrinho de Aluguel">
                            <i class="bi bi-cart3"></i>
                        </a>
                    </li>
                    @endif
                    @endauth
                    <li class="nav-item dropdown">
                        <a class="nav-link user-icon"
                            href="#"
                            role="button"
                            id="userDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            title="Menu de Usuário">
                            <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4" aria-labelledby="userDropdown">
                            @guest
                            <li>
                                <a class="dropdown-item" href="{{ url('/login') }}">
                                    <i class="bi bi-box-arrow-in-right"></i> Login
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/register') }}">
                                    <i class="bi bi-person-plus"></i> Registrar
                                </a>
                            </li>
                            @endguest
                            @auth
                            <li class="dropdown-item-text fw-bold border-bottom pb-2 mb-1">
                                <small class="text-muted d-block fw-normal text-uppercase" style="font-size: 10px; letter-spacing: 0.5px;">Conectado como</small>
                                <span class="d-block text-truncate" style="max-width: 170px;">{{ auth()->user()->name }}</span>
                            </li>
                            @if(auth()->user()->role === 'ADM')
                            <li>
                                <a class="dropdown-item" href="{{ url('/dashboard.adm') }}">
                                    <i class="bi bi-speedometer2"></i> Painel ADM
                                </a>
                            </li>
                            @else
                            <li>
                                <a class="dropdown-item" href="{{ url('/dashboard.cli') }}">
                                    <i class="bi bi-person-workspace"></i> Minha Área
                                </a>
                            </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider opacity-50">
                            </li>
                            <li>
                                <form method="POST" action="{{ url('/logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-left text-danger"></i> Sair
                                    </button>
                                </form>
                            </li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            <!-- Dynamic Alert Messages -->
            @if(session('success'))
            <div class="custom-alert custom-alert-success role="alert"">
                <i class="bi bi-check-circle-fill custom-alert-icon"></i>
                <div class="flex-grow-1">
                    {{ session('success') }}
                </div>
            </div>
            @endif
            @if(session('error'))
            <div class="custom-alert custom-alert-danger" role="alert">
                <i class="bi bi-exclamation-triangle-fill custom-alert-icon"></i>
                <div class="flex-grow-1">
                    {{ session('error') }}
                </div>
            </div>
            @endif
        </div>
        @yield('conteudo')
    </main>
    <!-- Premium Multi-column Footer -->
    <footer>
        <div class="container">
            <div class="row gy-4 align-items-center justify-content-between">
                <div class="col-12 col-md-4 text-center text-md-start">
                    <a class="footer-logo" href="{{ url('/') }}">
                        <span>Alugue</span><span>Too</span>
                    </a>
                    <p class="mb-0 small">Simplificando o aluguel de ferramentas e equipamentos com agilidade e segurança.</p>
                </div>
                
                <div class="col-12 col-md-4 text-center">
                    <div class="d-flex justify-content-center gap-3 mb-3 mb-md-0">
                        <a href="#" class="footer-link small">Sobre Nós</a>
                        <span class="text-muted opacity-50">•</span>
                        <a href="#" class="footer-link small">Termos de Uso</a>
                        <span class="text-muted opacity-50">•</span>
                        <a href="#" class="footer-link small">Ajuda</a>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center text-md-end">
                    <div class="mb-3">
                        <a href="#" class="footer-social-icon" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="footer-social-icon" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="footer-social-icon" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                    <p class="text-muted mb-0 small">
                        &copy; 2026 - AlugueToo. Todos os direitos reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
