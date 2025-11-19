<?php
// index.php
session_start();

// Configurações
$colors = [
    'primary' => '#86ba46',
    'secondary' => '#84bb40',
    'accent' => '#81bc3c',
    'dark' => '#223665'
];

// Dados de exemplo
$specialties = [
    ['name' => 'Clínico Geral', 'wait' => '45 dias', 'icon' => 'user'],
    ['name' => 'Cardiologia', 'wait' => '90 dias', 'icon' => 'heart'],
    ['name' => 'Dermatologia', 'wait' => '60 dias', 'icon' => 'user'],
    ['name' => 'Ortopedia', 'wait' => '75 dias', 'icon' => 'activity'],
    ['name' => 'Pediatria', 'wait' => '30 dias', 'icon' => 'baby'],
    ['name' => 'Ginecologia', 'wait' => '50 dias', 'icon' => 'user']
];

// Determinar tela atual
$screen = isset($_GET['screen']) ? $_GET['screen'] : 'home';
$specialty = isset($_GET['specialty']) ? $_GET['specialty'] : null;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Saúde Agora - Seu Acesso à Saúde</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: <?php echo $colors['primary']; ?>;
            --secondary: <?php echo $colors['secondary']; ?>;
            --accent: <?php echo $colors['accent']; ?>;
            --dark: <?php echo $colors['dark']; ?>;
            --light: #f8f9fa;
            --white: #ffffff;
            --shadow: rgba(34, 54, 101, 0.1);
            --shadow-lg: rgba(34, 54, 101, 0.2);
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: var(--light);
            color: var(--dark);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .app-container {
            max-width: 480px;
            margin: 0 auto;
            background: var(--white);
            min-height: 100vh;
            position: relative;
            box-shadow: 0 0 50px var(--shadow-lg);
        }

        /* Animações */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .slide-up {
            animation: slideUp 0.4s ease-out;
        }

        /* Tela Home */
        .home-screen {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 50%, var(--dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .home-screen::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        .home-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: var(--white);
            max-width: 400px;
        }

        .logo-container {
            margin-bottom: 2rem;
        }

        .logo-icon {
            font-size: 5rem;
            animation: pulse 2s ease-in-out infinite;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));
        }

        .home-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .home-subtitle {
            font-size: 1.5rem;
            margin-bottom: 3rem;
            opacity: 0.95;
        }

        .features-box {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255,255,255,0.2);
            text-align: left;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .feature-item:last-child {
            margin-bottom: 0;
        }

        .feature-icon {
            font-size: 1.5rem;
            flex-shrink: 0;
            margin-top: 0.25rem;
        }

        .feature-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .feature-desc {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .btn-primary {
            width: 100%;
            padding: 1.25rem;
            background: var(--white);
            color: var(--primary);
            border: none;
            border-radius: 1rem;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        }

        .login-link {
            margin-top: 1.5rem;
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .login-link span {
            text-decoration: underline;
            cursor: pointer;
            font-weight: 600;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            padding: 1.5rem;
            border-radius: 0 0 2rem 2rem;
            box-shadow: 0 4px 20px var(--shadow-lg);
        }

        .header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 3.5rem;
            height: 3.5rem;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            border: 3px solid rgba(255,255,255,0.5);
        }

        .user-greeting {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        .user-name {
            font-size: 1.3rem;
            font-weight: 700;
        }

        .location-icon {
            font-size: 1.5rem;
            cursor: pointer;
            opacity: 0.9;
            transition: opacity 0.3s;
        }

        .location-icon:hover {
            opacity: 1;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: none;
            border-radius: 1rem;
            font-size: 1rem;
            background: var(--white);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 6px 16px rgba(0,0,0,0.15);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        /* Alert Box */
        .alert-box {
            margin: -1rem 1.5rem 1.5rem;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: var(--white);
            padding: 1.25rem;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(255,107,53,0.3);
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .alert-box:hover {
            transform: translateY(-2px);
        }

        .alert-icon {
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .alert-content {
            flex: 1;
        }

        .alert-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .alert-desc {
            font-size: 0.85rem;
            opacity: 0.95;
        }

        /* Content */
        .content {
            padding: 1.5rem;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1.25rem;
        }

        /* Service Grid */
        .service-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .service-card {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 1.25rem;
            box-shadow: 0 4px 12px var(--shadow);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: var(--dark);
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px var(--shadow-lg);
        }

        .service-card.featured {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
        }

        .service-icon {
            font-size: 2.5rem;
            margin-bottom: 0.75rem;
        }

        .service-card.featured .service-icon {
            color: var(--white);
        }

        .service-card:not(.featured) .service-icon {
            color: var(--primary);
        }

        .service-name {
            font-weight: 700;
            font-size: 1.05rem;
            margin-bottom: 0.5rem;
        }

        .service-meta {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        /* Specialty List */
        .specialty-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .specialty-item {
            background: var(--white);
            padding: 1.25rem;
            border-radius: 1.25rem;
            box-shadow: 0 4px 12px var(--shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: var(--dark);
        }

        .specialty-item:hover {
            transform: translateX(4px);
            box-shadow: 0 6px 18px var(--shadow-lg);
        }

        .specialty-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .specialty-icon-box {
            width: 3.5rem;
            height: 3.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.5rem;
        }

        .specialty-name {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .specialty-wait {
            font-size: 0.85rem;
            color: #666;
        }

        .specialty-arrow {
            color: #999;
            font-size: 1.25rem;
        }

        /* Detail Screen */
        .detail-header {
            background: linear-gradient(135deg, var(--primary), var(--dark));
            color: var(--white);
            padding: 1.5rem;
        }

        .back-button {
            background: none;
            border: none;
            color: var(--white);
            font-size: 1rem;
            cursor: pointer;
            margin-bottom: 1rem;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .detail-subtitle {
            opacity: 0.9;
        }

        /* Option Cards */
        .option-card {
            background: var(--white);
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 4px 12px var(--shadow);
            margin-bottom: 1rem;
        }

        .option-header {
            padding: 1.5rem;
            border-left: 4px solid;
        }

        .option-header.sus {
            background: #e8f5e9;
            border-color: #4caf50;
        }

        .option-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .option-title {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--dark);
        }

        .badge {
            padding: 0.4rem 1rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--white);
        }

        .badge.free {
            background: #4caf50;
        }

        .option-info {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.75rem;
        }

        .option-date {
            font-size: 1.75rem;
            font-weight: 700;
            color: #ff6b35;
            margin-bottom: 0.5rem;
        }

        .option-wait {
            font-size: 0.8rem;
            color: #999;
        }

        .btn-option {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
        }

        .btn-sus {
            background: #4caf50;
            color: var(--white);
        }

        .btn-sus:hover {
            background: #45a049;
            transform: translateY(-2px);
        }

        /* Conversion Alert */
        .conversion-alert {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: var(--white);
            padding: 1.5rem;
            border-radius: 1.25rem;
            margin-bottom: 1.5rem;
            display: flex;
            gap: 1rem;
        }

        .conversion-icon {
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .conversion-title {
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .conversion-desc {
            font-size: 0.9rem;
            opacity: 0.95;
        }

        /* Private Options */
        .private-options {
            margin-top: 1.5rem;
        }

        .private-card {
            background: var(--white);
            border-radius: 1.25rem;
            padding: 1.25rem;
            box-shadow: 0 4px 12px var(--shadow);
            margin-bottom: 1rem;
        }

        .private-card.featured {
            border: 2px solid var(--primary);
        }

        .private-top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .private-info-box {
            display: flex;
            gap: 1rem;
        }

        .private-icon-box {
            width: 3.5rem;
            height: 3.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.5rem;
        }

        .private-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
            color: var(--dark);
        }

        .private-clinic {
            font-size: 0.8rem;
            color: #666;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        .star {
            color: #ffc107;
        }

        .private-price-box {
            text-align: right;
        }

        .private-price {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary);
        }

        .private-price-desc {
            font-size: 0.75rem;
            color: #666;
        }

        .private-features {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
        }

        .private-feature {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9rem;
            color: #666;
        }

        .private-feature i {
            color: var(--primary);
        }

        .private-feature.available {
            color: #4caf50;
            font-weight: 600;
        }

        .btn-private {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--white);
        }

        .btn-teleconsulta {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        .btn-teleconsulta:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(134, 186, 70, 0.4);
        }

        .btn-presencial {
            background: linear-gradient(135deg, var(--dark), var(--primary));
        }

        .btn-presencial:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(34, 54, 101, 0.4);
        }

        /* Fast Track Screen */
        .fasttrack-screen {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary), var(--dark));
            padding: 1.5rem;
            color: var(--white);
        }

        .fasttrack-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .fasttrack-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            animation: pulse 2s ease-in-out infinite;
        }

        .fasttrack-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .fasttrack-subtitle {
            opacity: 0.9;
        }

        .symptoms-box {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 1.5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .symptoms-title {
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 1.25rem;
        }

        .symptoms-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }

        .symptom-btn {
            background: rgba(255,255,255,0.25);
            border: none;
            padding: 1rem;
            border-radius: 0.75rem;
            color: var(--white);
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .symptom-btn:hover {
            background: rgba(255,255,255,0.35);
            transform: translateY(-2px);
        }

        .immediate-card {
            background: var(--white);
            color: var(--dark);
            border-radius: 1.5rem;
            padding: 1.5rem;
        }

        .immediate-title {
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 1.25rem;
        }

        .immediate-option {
            background: linear-gradient(to right, #e8f5e9, #f1f8f4);
            border: 2px solid var(--primary);
            border-radius: 1.25rem;
            padding: 1.25rem;
            margin-bottom: 1rem;
        }

        .immediate-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .immediate-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .immediate-icon-box {
            font-size: 2rem;
            color: var(--primary);
        }

        .immediate-name {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .immediate-specialty {
            font-size: 0.8rem;
            color: #666;
        }

        .immediate-price {
            text-align: right;
        }

        .immediate-amount {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .immediate-available {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #4caf50;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .btn-connect {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            border: none;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-connect:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(134, 186, 70, 0.5);
        }

        .benefits {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.8rem;
            color: #666;
        }

        /* Responsive */
        @media (max-width: 380px) {
            .home-title {
                font-size: 2.5rem;
            }

            .service-grid {
                gap: 0.75rem;
            }

            .service-card {
                padding: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="app-container">
        <?php
            // Carrega a tela correspondente em screens/<screen>.php
            $screen_file = __DIR__ . '/screens/' . $screen . '.php';
            if (file_exists($screen_file)) {
                include $screen_file;
            } else {
                include __DIR__ . '/screens/notfound.php';
            }
        ?>
    </div>

    <script>
        // Prevenir zoom em inputs no iOS
        document.addEventListener('touchstart', function(e) {
            if (e.touches.length > 1) {
                e.preventDefault();
            }
        }, { passive: false });

        // Smooth scroll
        document.querySelectorAll('a[href^="?"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                window.scrollTo(0, 0);
            });
        });

        // Animações ao scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.slide-up').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.5s ease-out';
            observer.observe(el);
        });

        // Evitar refresh acidental
        let lastTouchY = 0;
        let preventPullToRefresh = false;

        document.addEventListener('touchstart', function(e) {
            if (e.touches.length !== 1) { return; }
            lastTouchY = e.touches[0].clientY;
            preventPullToRefresh = window.pageYOffset === 0;
        }, { passive: false });

        document.addEventListener('touchmove', function(e) {
            const touchY = e.touches[0].clientY;
            const touchYDelta = touchY - lastTouchY;
            lastTouchY = touchY;

            if (preventPullToRefresh) {
                preventPullToRefresh = false;
                if (touchYDelta > 0) {
                    e.preventDefault();
                    return;
                }
            }
        }, { passive: false });
    </script>
</body>
</html>