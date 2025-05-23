<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>E-Library - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Styles omitted for brevity, paste your existing <style> here -->
        <style>
            :root {
                --primary: #3b82f6;
                --secondary: #6366f1;
                --dark: #0f172a;
                --darker: #020617;
                --light: #f8fafc;
                --error: #ef4444;
            }
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Inter', sans-serif;
            }
            
            body {
                background-color: var(--darker);
                color: var(--light);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow-x: hidden;
                position: relative;
            }
            
            .background {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -2;
                background: radial-gradient(circle at top right, rgba(99, 102, 241, 0.15), transparent 40%),
                            radial-gradient(circle at bottom left, rgba(59, 130, 246, 0.15), transparent 40%);
            }
            
            .glow {
                position: absolute;
                border-radius: 50%;
                filter: blur(80px);
                z-index: -1;
                opacity: 0.6;
            }
            
            .glow-1 {
                top: -100px;
                left: -100px;
                width: 300px;
                height: 300px;
                background-color: var(--primary);
            }
            
            .glow-2 {
                bottom: -100px;
                right: -100px;
                width: 350px;
                height: 350px;
                background-color: var(--secondary);
            }
            
            .container {
                width: 90%;
                max-width: 480px;
                margin: 2rem auto;
                background: rgba(15, 23, 42, 0.6);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
                border: 1px solid rgba(255, 255, 255, 0.1);
                position: relative;
                z-index: 1;
            }
            
            .auth-section {
                padding: 2.5rem;
                display: flex;
                flex-direction: column;
                position: relative;
            }
            
            .logo {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                margin-bottom: 2rem;
            }
            
            .logo-icon {
                width: 2rem;
                height: 2rem;
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .logo-text {
                font-weight: 600;
                font-size: 1.25rem;
                background: linear-gradient(to right, var(--primary), var(--secondary));
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }
            
            .auth-title {
                font-size: 1.875rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
            }
            
            .auth-subtitle {
                color: rgba(255, 255, 255, 0.6);
                margin-bottom: 2rem;
                font-size: 0.875rem;
            }
            
            .form-group {
                margin-bottom: 1.5rem;
            }
            
            .form-label {
                display: block;
                margin-bottom: 0.5rem;
                font-size: 0.875rem;
                font-weight: 500;
            }
            
            .form-input {
                width: 100%;
                padding: 0.75rem 1rem;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 8px;
                color: var(--light);
                font-size: 0.875rem;
                transition: all 0.3s ease;
            }
            
            .form-input:focus {
                outline: none;
                border-color: var(--primary);
                box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
            }
            
            .form-input.error {
                border-color: var(--error);
            }
            
            .password-input-wrapper {
                position: relative;
            }
            
            .password-toggle {
                position: absolute;
                right: 1rem;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                color: rgba(255, 255, 255, 0.6);
                cursor: pointer;
                font-size: 0.75rem;
                text-transform: uppercase;
            }
            
            .checkbox-wrapper {
                display: flex;
                align-items: center;
                margin-bottom: 1.5rem;
            }
            
            .checkbox-input {
                appearance: none;
                width: 1.125rem;
                height: 1.125rem;
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 4px;
                margin-right: 0.5rem;
                position: relative;
                cursor: pointer;
                background: rgba(255, 255, 255, 0.05);
            }
            
            .checkbox-input:checked {
                background: var(--primary);
                border-color: var(--primary);
            }
            
            .checkbox-input:checked::after {
                content: "✓";
                position: absolute;
                color: white;
                font-size: 0.75rem;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            
            .checkbox-label {
                font-size: 0.875rem;
                color: rgba(255, 255, 255, 0.8);
            }
            
            .btn {
                display: block;
                width: 100%;
                padding: 0.875rem;
                border-radius: 8px;
                border: none;
                font-weight: 600;
                font-size: 0.875rem;
                cursor: pointer;
                transition: all 0.3s ease;
                text-align: center;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                color: white;
            }
            
            .btn-primary:hover {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
                transform: translateY(-2px);
            }
            
            .auth-footer {
                margin-top: 2rem;
                text-align: center;
                font-size: 0.875rem;
                color: rgba(255, 255, 255, 0.6);
            }
            
            .auth-link {
                color: var(--primary);
                text-decoration: none;
                font-weight: 500;
                transition: color 0.3s ease;
            }
            
            .auth-link:hover {
                color: var(--secondary);
                text-decoration: underline;
            }
            
            .error-message {
                color: var(--error);
                font-size: 0.75rem;
                margin-top: 0.25rem;
                display: none;
            }
            
            .form-input.error + .error-message,
            .form-input.error ~ .error-message {
                display: block;
            }
            
            .alert {
                padding: 0.75rem 1rem;
                border-radius: 8px;
                margin-bottom: 1.5rem;
                font-size: 0.875rem;
                display: none;
            }
            
            .alert-error {
                background: rgba(239, 68, 68, 0.1);
                border: 1px solid rgba(239, 68, 68, 0.2);
                color: #fca5a5;
            }
            
            .illustration {
                position: absolute;
                width: 300px;
                height: 300px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                opacity: 0.05;
                pointer-events: none;
                z-index: -1;
            }
        </style>
</head>
<body>
    <div class="background"></div>
    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>

    <div class="container">
        <div class="auth-section">
            <div class="logo">
                <div class="logo-icon">
                    <svg xmlns="#" width="16" height="16" fill="white" viewBox="0 0 16 16">
                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg>
                </div>
                <span class="logo-text">E-Library</span>
            </div>

            <h1 class="auth-title">Sign in</h1>
            <p class="auth-subtitle">Access your library and continue reading</p>

            {{-- Laravel Error Alert --}}
            @if ($errors->any())
            <div class="alert alert-error">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" id="login-form">
                @csrf
                <div class="form-group">
                    <label for="login-email" class="form-label">Email</label>
                    <input
                        type="email"
                        id="login-email"
                        name="email"
                        class="form-input @error('email') error @enderror"
                        placeholder="Masukan Email"
                        required
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="login-password" class="form-label">Password</label>
                    <div class="password-input-wrapper">
                        <input
                            type="password"
                            id="login-password"
                            name="password"
                            class="form-input @error('password') error @enderror"
                            placeholder="••••••••"
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('login-password', this)">Show</button>
                    </div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="checkbox-wrapper">
                    <input type="checkbox" id="remember" name="remember" class="checkbox-input" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="checkbox-label">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>

            <div class="auth-footer">
                <p>Forgot your password? <a href="#" class="auth-link">Reset it</a></p>
                <p style="margin-top: 0.75rem;">Don't have an account? <a href="{{ route('register') }}" class="auth-link">Create account</a></p>
            </div>
        </div>
    </div>

    {{-- <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                button.textContent = 'Hide';
            } else {
                input.type = 'password';
                button.textContent = 'Show';
            }
        }
    </script> --}}
</body>
</html>
