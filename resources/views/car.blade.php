<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top View Neumorphic Car</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0f0f0;
            overflow: hidden;
            font-family: 'Arial', sans-serif;
            transition: background 0.5s ease;
        }

        body.dark {
            background: #1a1a2e;
        }

        /* Dark mode toggle */
        .toggle-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 100;
        }

        .toggle {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 30px;
        }

        .toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #f0f0f0;
            box-shadow: 5px 5px 10px #d9d9d9, -5px -5px 10px #ffffff;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background: linear-gradient(145deg, #6c5ce7, #a29bfe);
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background: #16213e;
            box-shadow: 5px 5px 10px #0a0a0f, -5px -5px 10px #2a2a4d;
        }

        input:checked + .slider:before {
            transform: translateX(30px);
            background: linear-gradient(145deg, #a29bfe, #6c5ce7);
        }

        /* Container */
        .world {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        /* Car */
        .car {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 120px;
            height: 200px;
            transform-style: preserve-3d;
            transform: translate(-50%, -50%);
            transition: left 1s ease-out;
        }

        .car-body {
            position: absolute;
            width: 120px;
            height: 200px;
            background: #f0f0f0;
            box-shadow: 
                8px 8px 15px #d9d9d9,
                -8px -8px 15px #ffffff;
            border-radius: 10px;
            transform-style: preserve-3d;
        }

        .dark .car-body {
            background: #16213e;
            box-shadow: 
                8px 8px 15px #0a0a0f,
                -8px -8px 15px #2a2a4d;
        }

        .car-top {
            position: absolute;
            width: 120px;
            height: 200px;
            background: inherit;
            border-radius: 10px;
            box-shadow: inherit;
        }

        .car-front {
            position: absolute;
            width: 120px;
            height: 20px;
            background: inherit;
            transform: rotateX(90deg) translateZ(100px) translateY(-10px);
            border-radius: 10px 10px 0 0;
            box-shadow: inherit;
        }

        .car-back {
            position: absolute;
            width: 120px;
            height: 20px;
            background: inherit;
            transform: rotateX(90deg) translateZ(-100px) translateY(-10px);
            border-radius: 0 0 10px 10px;
            box-shadow: inherit;
        }

        .car-left {
            position: absolute;
            width: 20px;
            height: 200px;
            background: inherit;
            transform: rotateY(90deg) translateZ(-60px) translateX(-10px);
            border-radius: 10px 0 0 10px;
            box-shadow: inherit;
        }

        .car-right {
            position: absolute;
            width: 20px;
            height: 200px;
            background: inherit;
            transform: rotateY(90deg) translateZ(60px) translateX(-10px);
            border-radius: 0 10px 10px 0;
            box-shadow: inherit;
        }

        /* Wheels */
        .wheel {
            position: absolute;
            width: 30px;
            height: 50px;
            background: #222;
            border-radius: 25px;
            box-shadow: 
                3px 3px 6px rgba(0,0,0,0.3),
                -3px -3px 6px rgba(255,255,255,0.1);
            transform-style: preserve-3d;
        }

        .wheel::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 40px;
            background: #444;
            border-radius: 20px;
            top: 5px;
            left: 5px;
            box-shadow: inset 2px 2px 4px rgba(0,0,0,0.5);
        }

        .front-wheel-left {
            top: 20px;
            left: -15px;
            transform: rotateY(90deg);
        }

        .front-wheel-right {
            top: 20px;
            right: -15px;
            transform: rotateY(90deg);
        }

        .back-wheel-left {
            bottom: 20px;
            left: -15px;
            transform: rotateY(90deg);
        }

        .back-wheel-right {
            bottom: 20px;
            right: -15px;
            transform: rotateY(90deg);
        }

        /* Car Details */
        .window {
            position: absolute;
            width: 80px;
            height: 80px;
            background: rgba(200, 220, 255, 0.3);
            top: 30px;
            left: 20px;
            border-radius: 5px;
            box-shadow: 
                inset 3px 3px 5px rgba(0,0,0,0.1),
                inset -3px -3px 5px rgba(255,255,255,0.5);
        }

        .headlight {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #ffeb3b;
            top: 10px;
            left: 55px;
            border-radius: 50%;
            box-shadow: 0 0 10px #ffeb3b;
        }

        .taillight {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #ff5252;
            bottom: 10px;
            left: 55px;
            border-radius: 50%;
            box-shadow: 0 0 10px #ff5252;
        }

        /* Title */
        .title {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 3rem;
            font-weight: bold;
            color: #6c5ce7;
            text-shadow: 
                2px 2px 4px rgba(0, 0, 0, 0.1),
                -2px -2px 4px rgba(255, 255, 255, 0.8);
            z-index: 10;
            text-align: center;
        }

        .dark .title {
            color: #a29bfe;
            text-shadow: 
                2px 2px 4px rgba(0, 0, 0, 0.3),
                -2px -2px 4px rgba(255, 255, 255, 0.1);
        }

        .subtitle {
            font-size: 1.5rem;
            margin-top: 1rem;
            color: #666;
        }

        .dark .subtitle {
            color: #a1a1aa;
        }
    </style>
</head>
<body>
    <div class="toggle-container">
        <label class="toggle">
            <input type="checkbox" id="darkModeToggle">
            <span class="slider"></span>
        </label>
    </div>

    <div class="world">
        <div class="title">
            Top View Neumorphic Car
            <div class="subtitle">Random Movement</div>
        </div>
        
        <!-- Car -->
        <div class="car">
            <div class="car-body">
                <div class="car-top"></div>
                <div class="car-front"></div>
                <div class="car-back"></div>
                <div class="car-left"></div>
                <div class="car-right"></div>
                <div class="window"></div>
                <div class="headlight"></div>
                <div class="taillight"></div>
                <div class="wheel front-wheel-left"></div>
                <div class="wheel front-wheel-right"></div>
                <div class="wheel back-wheel-left"></div>
                <div class="wheel back-wheel-right"></div>
            </div>
        </div>
    </div>

    <script>
        // Dark Mode Toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        
        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark');
            darkModeToggle.checked = true;
        }
        
        darkModeToggle.addEventListener('change', () => {
            if (darkModeToggle.checked) {
                document.body.classList.add('dark');
                localStorage.setItem('darkMode', 'enabled');
            } else {
                document.body.classList.remove('dark');
                localStorage.setItem('darkMode', 'disabled');
            }
        });

        // Random car movement
        const car = document.querySelector('.car');
        const worldWidth = window.innerWidth;
        const carWidth = 120;
        
        function moveCar() {
            // Generate random position between 10% and 90% of screen width
            const minPos = carWidth / 2;
            const maxPos = worldWidth - (carWidth / 2);
            const randomPos = Math.floor(Math.random() * (maxPos - minPos + 1) + minPos);
            
            // Apply new position
            car.style.left = `${randomPos}px`;
            
            // Random duration between 1-3 seconds
            const duration = Math.random() * 2000 + 1000;
            
            // Schedule next move
            setTimeout(moveCar, duration);
        }
        
        // Start moving
        moveCar();
    </script>
</body>
</html>