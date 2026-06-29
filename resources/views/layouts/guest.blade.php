<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CleanPro')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        /* Background animated shapes */
        body::before {
            content: '';
            position: absolute;
            top: -30%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: floatBg 8s ease-in-out infinite;
        }
        body::after {
            content: '';
            position: absolute;
            bottom: -30%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: floatBg 10s ease-in-out infinite reverse;
        }
        
        @keyframes floatBg {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(30px, -30px) scale(1.1); }
        }
        
        .auth-wrapper {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
            /* Animasi slide up saat load */
            animation: slideUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
            opacity: 0;
            transform: translateY(40px);
        }
        
        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(40px) scale(0.96);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .auth-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.25);
            padding: 45px 40px 40px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .auth-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 35px 90px rgba(0, 0, 0, 0.3);
        }
        
        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #667eea);
            background-size: 200% 100%;
            animation: gradientMove 3s ease infinite;
        }
        
        @keyframes gradientMove {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .auth-card .logo {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .auth-card .logo .logo-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 32px;
            margin-bottom: 16px;
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.35);
            transition: transform 0.3s ease;
        }
        
        .auth-card .logo .logo-icon:hover {
            transform: rotate(-5deg) scale(1.05);
        }
        
        .auth-card .logo h3 {
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 4px;
            font-size: 1.8rem;
        }
        
        .auth-card .logo h3 span {
            color: #667eea;
        }
        
        .auth-card .logo p {
            color: #718096;
            font-size: 0.95rem;
            margin-bottom: 0;
        }
        
        .auth-card .form-label {
            font-weight: 600;
            color: #2d3748;
            font-size: 0.9rem;
        }
        
        .auth-card .input-group {
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            background: white;
        }
        
        .auth-card .input-group:focus-within {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.12);
        }
        
        .auth-card .input-group .input-group-text {
            background: transparent;
            border: none;
            color: #a0aec0;
            padding: 0 0 0 16px;
            font-size: 18px;
        }
        
        .auth-card .input-group .form-control {
            border: none;
            padding: 14px 16px;
            font-size: 0.95rem;
            background: transparent;
            box-shadow: none;
        }
        
        .auth-card .input-group .form-control:focus {
            box-shadow: none;
        }
        
        .auth-card .input-group .form-control::placeholder {
            color: #a0aec0;
        }
        
        .auth-card .input-group .btn-toggle-password {
            background: transparent;
            border: none;
            color: #a0aec0;
            padding: 0 16px 0 0;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .auth-card .input-group .btn-toggle-password:hover {
            color: #667eea;
        }
        
        .auth-card .form-text {
            font-size: 0.8rem;
            color: #718096;
        }
        
        .auth-card .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .auth-card .btn-primary::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: left 0.5s ease;
        }
        
        .auth-card .btn-primary:hover::after {
            left: 100%;
        }
        
        .auth-card .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
        }
        
        .auth-card .btn-primary:active {
            transform: translateY(0);
        }
        
        .auth-card .divider {
            display: flex;
            align-items: center;
            margin: 24px 0;
        }
        
        .auth-card .divider::before,
        .auth-card .divider::after {
            content: '';
            flex: 1;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .auth-card .divider span {
            padding: 0 16px;
            color: #a0aec0;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .auth-card .btn-social {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            color: #4a5568;
            transition: all 0.3s ease;
            background: white;
        }
        
        .auth-card .btn-social:hover {
            border-color: #667eea;
            color: #667eea;
            background: rgba(102, 126, 234, 0.04);
        }
        
        .auth-card .btn-social i {
            font-size: 20px;
            margin-right: 8px;
        }
        
        .auth-card .auth-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .auth-card .auth-link:hover {
            color: #5a67d8;
            text-decoration: underline;
        }
        
        .auth-card .alert {
            border-radius: 12px;
            border: none;
            font-size: 0.9rem;
        }
        
        .auth-card .alert-success {
            background: #f0fff4;
            color: #22543d;
        }
        
        .auth-card .alert-danger {
            background: #fff5f5;
            color: #9b2c2c;
        }
        
        .auth-card .alert-info {
            background: #ebf8ff;
            color: #2c5282;
        }
        
        .auth-card .demo-credentials {
            background: #f7fafc;
            border-radius: 12px;
            padding: 16px;
            margin-top: 20px;
            font-size: 0.85rem;
            border: 1px dashed #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .auth-card .demo-credentials:hover {
            border-color: #667eea;
            background: #f0f4ff;
        }
        
        .auth-card .demo-credentials strong {
            color: #2d3748;
        }
        
        .auth-card .demo-credentials .cred-item {
            display: flex;
            justify-content: space-between;
            padding: 2px 0;
        }
        
        .auth-card .demo-credentials .cred-item span:last-child {
            color: #667eea;
            font-weight: 600;
        }
        
        .auth-footer {
            text-align: center;
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
            opacity: 0;
            animation: fadeIn 1s ease 0.5s forwards;
        }
        
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        
        .auth-footer a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }
        
        .auth-footer a:hover {
            text-decoration: underline;
        }
        
        /* Error styling */
        .is-invalid {
            border-color: #fc8181 !important;
        }
        
        .invalid-feedback {
            font-size: 0.8rem;
            color: #fc8181;
            margin-top: 4px;
        }
        
        /* Checkbox styling */
        .form-check-input {
            width: 18px;
            height: 18px;
            margin-top: 2px;
            border: 2px solid #e2e8f0;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
        }
        
        .form-check-label {
            color: #4a5568;
            font-size: 0.9rem;
        }
        
        /* Stagger animation for form elements */
        .auth-card .form-group {
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .auth-card .form-group:nth-child(1) { animation-delay: 0.1s; }
        .auth-card .form-group:nth-child(2) { animation-delay: 0.2s; }
        .auth-card .form-group:nth-child(3) { animation-delay: 0.3s; }
        .auth-card .form-group:nth-child(4) { animation-delay: 0.4s; }
        .auth-card .form-group:nth-child(5) { animation-delay: 0.5s; }
        
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(15px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .auth-card .btn-submit {
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.5s forwards;
        }
        
        .auth-card .divider-auth {
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.6s forwards;
        }
        
        .auth-card .social-login {
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.7s forwards;
        }
        
        .auth-card .auth-link-bottom {
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.8s forwards;
        }
        
        .auth-card .demo-credentials {
            opacity: 0;
            animation: fadeInUp 0.6s ease 0.9s forwards;
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .auth-card {
                padding: 30px 20px 25px;
            }
            
            .auth-card .logo .logo-icon {
                width: 60px;
                height: 60px;
                font-size: 26px;
            }
            
            .auth-card .logo h3 {
                font-size: 1.5rem;
            }
            
            .auth-card .input-group .form-control {
                padding: 12px 14px;
                font-size: 0.9rem;
            }
            
            .auth-card .btn-primary {
                padding: 12px;
                font-size: 0.95rem;
            }
            
            .auth-card .demo-credentials .cred-item {
                flex-direction: column;
                gap: 2px;
            }
        }
        
        @media (max-width: 400px) {
            .auth-card {
                padding: 24px 16px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card">
            <!-- Logo -->
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-broom"></i>
                </div>
                <h3>Clean<span>Pro</span></h3>
                <p>@yield('subtitle', 'Jasa Cleaning Service Profesional')</p>
            </div>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('status'))
                <div class="alert alert-info alert-dismissible fade show">
                    <i class="fas fa-info-circle me-2"></i> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Content -->
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="auth-footer">
            &copy; {{ date('Y') }} <a href="/">CleanPro</a>. All rights reserved.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        document.querySelectorAll('.btn-toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.closest('.input-group').querySelector('.form-control');
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    </script>
</body>
</html>