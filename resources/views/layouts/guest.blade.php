<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CleanPro')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .auth-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 40px;
            max-width: 450px;
            width: 100%;
            animation: fadeInUp 0.6s ease;
        }
        .auth-card .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .auth-card .logo i {
            font-size: 50px;
            color: #667eea;
            background: rgba(102, 126, 234, 0.1);
            padding: 20px;
            border-radius: 50%;
        }
        .auth-card .logo h3 {
            margin-top: 15px;
            font-weight: 700;
            color: #2d3748;
        }
        .auth-card .logo p {
            color: #718096;
            font-size: 14px;
        }
        .auth-card .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s;
        }
        .auth-card .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }
        .auth-card .btn-primary {
            background: #667eea;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .auth-card .btn-primary:hover {
            background: #5a67d8;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        .auth-card .btn-google {
            background: #db4437;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
        }
        .auth-card .btn-google:hover {
            background: #c53929;
        }
        .auth-card .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        .auth-card .divider::before,
        .auth-card .divider::after {
            content: '';
            flex: 1;
            border-bottom: 2px solid #e2e8f0;
        }
        .auth-card .divider span {
            padding: 0 15px;
            color: #a0aec0;
            font-size: 14px;
        }
        .auth-card .form-label {
            font-weight: 600;
            color: #2d3748;
        }
        .auth-card a {
            color: #667eea;
            text-decoration: none;
        }
        .auth-card a:hover {
            text-decoration: underline;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .auth-card .input-group-text {
            background: white;
            border: 2px solid #e2e8f0;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: #a0aec0;
        }
        .auth-card .input-group .form-control {
            border-radius: 0 12px 12px 0;
        }
        .auth-card .input-group {
            margin-bottom: 0;
        }
        .alert {
            border-radius: 12px;
        }
        @media (max-width: 480px) {
            .auth-card {
                padding: 30px 20px;
                margin: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="logo">
            <i class="fas fa-broom"></i>
            <h3>CleanPro</h3>
            <p>@yield('subtitle', 'Jasa Cleaning Service Profesional')</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>