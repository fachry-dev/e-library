<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0a0a14;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(120, 68, 188, 0.1) 0%, transparent 20%),
                radial-gradient(circle at 90% 10%, rgba(120, 68, 188, 0.1) 0%, transparent 20%),
                radial-gradient(circle at 80% 80%, rgba(120, 68, 188, 0.1) 0%, transparent 20%),
                radial-gradient(circle at 20% 70%, rgba(120, 68, 188, 0.1) 0%, transparent 20%);
            color: white;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .grid-lines {
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 100px 100px;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
        }
        .purple-glow {
            position: absolute;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background-color: #a855f7;
            box-shadow: 0 0 20px 5px rgba(168, 85, 247, 0.5);
            z-index: -1;
        }
        .center-orb {
            position: absolute;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: radial-gradient(circle, #a855f7 0%, #6b21a8 100%);
            box-shadow: 0 0 40px 10px rgba(168, 85, 247, 0.6);
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            z-index: -1;
        }
        .btn {
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: linear-gradient(90deg, #9333ea 0%, #a855f7 100%);
            color: white;
        }
        .btn-primary:hover {
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.5);
            transform: translateY(-2px);
        }
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
        .highlight {
            color: #a855f7;
        }
    </style>
</head>
<body>
    <div class="grid-lines"></div>
    <div class="center-orb"></div>
    <div class="purple-glow" style="top: 20%; left: 15%;"></div>
    <div class="purple-glow" style="top: 30%; right: 20%;"></div>
    <div class="purple-glow" style="top: 70%; left: 25%;"></div>
    <div class="purple-glow" style="top: 60%; right: 15%;"></div>
    <div class="purple-glow" style="top: 85%; left: 45%;"></div>

    <div class="min-h-screen flex flex-col items-center justify-center px-4 relative">
        <main class="text-center max-w-4xl mx-auto mt-20">
            <h1 class="text-5xl md:text-7xl font-bold mb-4">
                Buka jendela dunia lewat satu klik <span class="highlight">e-library</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 mb-10">
                Belajar dan bertumbuh bersama E-Library<br>
                Akses ribuan buku, kapan saja dan di mana saja
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
            </div>
        </main>

        <footer class="absolute bottom-10 text-center text-gray-400">
            <p>E-Library, membaca jadi mudah</p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const glowDots = document.querySelectorAll('.purple-glow');
            glowDots.forEach(dot => {
                const initialX = parseFloat(dot.style.left || dot.style.right) + (Math.random() * 20 - 10);
                const initialY = parseFloat(dot.style.top) + (Math.random() * 20 - 10);
                setInterval(() => {
                    const offsetX = Math.sin(Date.now() / 2000) * 10;
                    const offsetY = Math.cos(Date.now() / 2000) * 10;
                    if (dot.style.left) {
                        dot.style.left = `calc(${initialX}% + ${offsetX}px)`;
                    } else if (dot.style.right) {
                        dot.style.right = `calc(${initialX}% + ${offsetX}px)`;
                    }
                    dot.style.top = `calc(${initialY}% + ${offsetY}px)`;
                }, 50);
            });
        });
    </script>
</body>
</html>
