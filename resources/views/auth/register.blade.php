<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library - Create Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3b82f6;
            --secondary: #6366f1;
            --dark: #0f172a;
            --darker: #020617;
            --light: #f8fafc;
            --error: #ef4444;
            --success: #22c55e;
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
            right: -100px;
            width: 300px;
            height: 300px;
            background-color: var(--primary);
        }

        .glow-2 {
            bottom: -100px;
            left: -100px;
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
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .checkbox-input {
            appearance: none;
            width: 1.125rem;
            height: 1.125rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            margin-right: 0.5rem;
            margin-top: 0.125rem;
            position: relative;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.05);
            flex-shrink: 0;
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
        .form-input.error ~ .error-message,
        .checkbox-input.error ~ .error-message {
            display: block;
        }

        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            display: none;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #86efac;
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 16 16">
                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg>
                </div>
                <span class="logo-text">E-Library</span>
            </div>

            <h1 class="auth-title">Create account</h1>
            <p class="auth-subtitle">Join our library and discover thousands of books</p>

            <div id="register-success" class="alert alert-success">
                Account created successfully! You can now sign in.
            </div>

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="register-form" action="{{ route ('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="register-name" class="form-label">Full Name</label>
                    <input
                        type="text"
                        id="register-name"
                        name="name"
                        class="form-input"
                        placeholder="Tyler Smith"
                        required
                    >
                    <div class="error-message">Name must be at least 3 characters</div>
                </div>

                <div class="form-group">
                    <label for="register-email" class="form-label">Email</label>
                    <input
                        type="email"
                        id="register-email"
                        name="email"
                        class="form-input"
                        placeholder="your@email.com"
                        required
                    >
                    <div class="error-message">Please enter a valid email address</div>
                </div>

                <div class="form-group">
                    <label for="register-password" class="form-label">Password</label>
                    <div class="password-input-wrapper">
                        <input
                            type="password"
                            id="register-password"
                            name="password"
                            class="form-input"
                            placeholder="••••••••"
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('register-password', this)">Show</button>
                    </div>
                    <div class="error-message">Password must be at least 8 characters</div>
                </div>

                <div class="form-group">
                    <label for="register-password-confirm" class="form-label">Confirm Password</label>
                    <div class="password-input-wrapper">
                        <input
                            type="password"
                            id="register-password-confirm"
                            name="password_confirmation"
                            class="form-input"
                            placeholder="••••••••"
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('register-password-confirm', this)">Show</button>
                    </div>
                    <div class="error-message">Passwords do not match</div>
                </div>

                <div class="checkbox-wrapper">
                    <input
                        type="checkbox"
                        id="terms"
                        name="terms"
                        class="checkbox-input"
                        required
                    >
                    <label for="terms" class="checkbox-label">I agree to the <a href="#" class="auth-link">Terms of Service</a> and <a href="#" class="auth-link">Privacy Policy</a></label>
                    <div class="error-message">You must agree to the terms</div>
                </div>

                <button type="submit" class="btn btn-primary">Create account</button>
            </form>

            <div class="auth-footer">
                <p>Already have an account? <a href="{{ route('login') }}" class="auth-link">Sign in</a></p>
            </div>


        </div>
    </div>

    <script>
        // Toggle password visibility
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

        // Email validation function
        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1