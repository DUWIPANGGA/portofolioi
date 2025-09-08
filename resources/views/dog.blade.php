<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Skeleton Snake with Legs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes walk {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            25% { transform: translateY(-3px) rotate(5deg); }
            75% { transform: translateY(2px) rotate(-5deg); }
        }
        .segment-connector {
            position: absolute;
            width: 10px;
            height: 4px;
            background-color: #444;
            z-index: -1;
        }
    </style>
</head>
<body class="m-0 h-screen overflow-hidden bg-gray-900 cursor-none">
    <div id="creatureContainer" class="absolute z-50">
        <!-- Segments will be added by JavaScript -->
    </div>

    <script>
        // Configuration
        const segmentCount = 8;
        const segmentWidth = 30;
        const segmentHeight = 20;
        const legCountPerSegment = 2;
        const followSpeed = 0.08;
        const segmentDelay = 0.04;

        const container = document.getElementById('creatureContainer');
        const segments = [];
        let mouseX = window.innerWidth / 2;
        let mouseY = window.innerHeight / 2;

        // Create segments
        for (let i = 0; i < segmentCount; i++) {
            const segment = document.createElement('div');
            segment.className = `absolute bg-gray-600 rounded-sm border-2 border-gray-400`;
            segment.style.width = `${segmentWidth}px`;
            segment.style.height = `${segmentHeight}px`;
            segment.style.left = `${mouseX - i * segmentWidth * 0.7}px`;
            segment.style.top = `${mouseY}px`;
            segment.dataset.index = i;
            
            // Add legs to each segment
            for (let j = 0; j < legCountPerSegment; j++) {
                const leg = document.createElement('div');
                leg.className = `absolute w-2 h-6 bg-gray-700 rounded-sm`;
                leg.style.bottom = `-6px`;
                leg.style.left = `${j === 0 ? 5 : segmentWidth - 7}px`;
                leg.style.animation = `walk 0.5s infinite ${(i * 0.1 + j * 0.25)}s`;
                segment.appendChild(leg);
            }
            
            // Add head features to first segment
            if (i === 0) {
                const eye = document.createElement('div');
                eye.className = `absolute w-2 h-2 bg-red-500 rounded-full right-2 top-2 shadow-[0_0_5px_2px_rgba(255,0,0,0.7)]`;
                segment.appendChild(eye);
                
                segment.style.backgroundColor = '#444';
                segment.style.zIndex = segmentCount - i;
            } else {
                segment.style.zIndex = segmentCount - i;
            }
            
            container.appendChild(segment);
            segments.push({
                element: segment,
                x: mouseX - i * segmentWidth * 0.7,
                y: mouseY,
                targetX: mouseX - i * segmentWidth * 0.7,
                targetY: mouseY
            });
            
            // Add connector between segments (except first one)
            if (i > 0) {
                const connector = document.createElement('div');
                connector.className = 'segment-connector';
                connector.style.left = `${-5}px`;
                connector.style.top = `${segmentHeight / 2 - 2}px`;
                segment.appendChild(connector);
            }
        }

        // Track mouse movement
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        // Animation loop
        function animate() {
            // Update head (first segment)
            const head = segments[0];
            const dx = mouseX - head.x;
            const dy = mouseY - head.y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            // Only move if cursor is far enough
            if (distance > 5) {
                const angle = Math.atan2(dy, dx);
                
                head.targetX = mouseX - Math.cos(angle) * 20;
                head.targetY = mouseY - Math.sin(angle) * 20;
                
                // Rotate head to face direction
                head.element.style.transform = `rotate(${angle}rad)`;
            }
            
            // Update all segments
            segments.forEach((segment, index) => {
                if (index > 0) {
                    // Follow previous segment
                    const leader = segments[index - 1];
                    const leaderAngle = Math.atan2(
                        leader.y - segment.y,
                        leader.x - segment.x
                    );
                    
                    segment.targetX = leader.x - Math.cos(leaderAngle) * segmentWidth * 0.7;
                    segment.targetY = leader.y - Math.sin(leaderAngle) * segmentWidth * 0.7;
                    
                    // Slight rotation for body segments
                    if (index < segmentCount - 1) {
                        segment.element.style.transform = `rotate(${leaderAngle}rad)`;
                    }
                }
                
                // Ease toward target position
                segment.x += (segment.targetX - segment.x) * followSpeed;
                segment.y += (segment.targetY - segment.y) * followSpeed;
                
                // Apply position with delay based on segment index
                setTimeout(() => {
                    segment.element.style.left = `${segment.x}px`;
                    segment.element.style.top = `${segment.y}px`;
                }, index * segmentDelay * 1000);
            });
            
            requestAnimationFrame(animate);
        }

        animate();
    </script>
</body>
</html>