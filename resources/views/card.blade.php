<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elastic Card with Lanyard</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            user-select: none;
            overflow: hidden;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .anchor {
            position: absolute;
            top: 20%;
            left: 50%;
            width: 10px;
            height: 10px;
            background: rgba(255,255,255,0.5);
            border-radius: 50%;
            transform: translate(-50%, 0);
        }

        .card {
            width: 300px;
            height: 350px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            position: absolute;
            cursor: grab;
            transition: box-shadow 0.2s ease;
            transform-origin: center top;
        }

        .card:active {
            cursor: grabbing;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .profile-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .info {
            padding: 15px;
        }

        .lanyard {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.7);
            transform-origin: top center;
            z-index: -1;
        }

        .lanyard-string {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.5);
            transform-origin: top center;
            z-index: -1;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="anchor"></div>
    <div class="card" id="profileCard">
        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=634&q=80" class="profile-image">
        <div class="info">
            <h3 style="margin:0;">Alex Johnson</h3>
            <p style="color:gray;margin:5px 0;">Frontend Developer</p>
            <button style="padding:6px 10px;border:none;background:#eee;border-radius:5px;cursor:pointer;">View Profile</button>
        </div>
    </div>
</div>

<script>
const card = document.getElementById('profileCard');
const container = document.querySelector('.container');
const anchor = document.querySelector('.anchor');

// Initial position (centered)
let posX = window.innerWidth / 2 - card.offsetWidth / 2;
let posY = window.innerHeight / 2 - card.offsetHeight / 2;
let velX = 0;
let velY = 0;
let isDragging = false;
let offsetX = 0;
let offsetY = 0;

// Anchor point (top center of the card)
const anchorX = window.innerWidth / 2;
const anchorY = 100; // 100px from top

// Create lanyard elements
const lanyard = document.createElement('div');
lanyard.className = 'lanyard';
container.appendChild(lanyard);

const lanyardString = document.createElement('div');
lanyardString.className = 'lanyard-string';
container.appendChild(lanyardString);

// Set initial position
card.style.left = posX + 'px';
card.style.top = posY + 'px';

// Physics constants
const stiffness = 0.2; // How stiff the lanyard is
const damping = 0.9; // How much energy is lost over time
const mass = 1; // Mass of the card

// Animation variables
let lastTime = 0;
let animationId;

// Mouse events
card.addEventListener('mousedown', startDrag);
document.addEventListener('mousemove', drag);
document.addEventListener('mouseup', endDrag);

function startDrag(e) {
    isDragging = true;
    offsetX = e.clientX - card.offsetLeft;
    offsetY = e.clientY - card.offsetTop;
    card.style.cursor = 'grabbing';
    cancelAnimationFrame(animationId);
}

function drag(e) {
    if (!isDragging) return;
    
    posX = e.clientX - offsetX;
    posY = e.clientY - offsetY;
    
    // Boundary checks
    posX = Math.max(0, Math.min(posX, window.innerWidth - card.offsetWidth));
    posY = Math.max(0, Math.min(posY, window.innerHeight - card.offsetHeight));
    
    card.style.left = posX + 'px';
    card.style.top = posY + 'px';
    
    updateLanyard();
}

function endDrag() {
    if (!isDragging) return;
    
    isDragging = false;
    card.style.cursor = 'grab';
    lastTime = performance.now();
    animate();
}

function updateLanyard() {
    const cardRect = card.getBoundingClientRect();
    const cardTopCenter = {
        x: cardRect.left + cardRect.width / 2,
        y: cardRect.top
    };
    
    // Calculate distance between anchor and card
    const dx = cardTopCenter.x - anchorX;
    const dy = cardTopCenter.y - anchorY;
    const distance = Math.sqrt(dx * dx + dy * dy);
    
    // Angle of the lanyard
    const angle = Math.atan2(dy, dx);
    
    // Update lanyard visuals
    lanyard.style.width = '4px';
    lanyard.style.height = distance + 'px';
    lanyard.style.left = anchorX + 'px';
    lanyard.style.top = anchorY + 'px';
    lanyard.style.transform = `rotate(${angle}rad)`;
    
    // Thin string from anchor to card
    lanyardString.style.width = '2px';
    lanyardString.style.height = distance + 'px';
    lanyardString.style.left = anchorX + 'px';
    lanyardString.style.top = anchorY + 'px';
    lanyardString.style.transform = `rotate(${angle}rad)`;
}

function animate(currentTime = 0) {
    if (isDragging) return;
    
    const deltaTime = (currentTime - lastTime) / 1000;
    lastTime = currentTime;
    
    if (deltaTime > 0.1) {
        animationId = requestAnimationFrame(animate);
        return;
    }
    
    const cardRect = card.getBoundingClientRect();
    const cardTopCenter = {
        x: cardRect.left + cardRect.width / 2,
        y: cardRect.top
    };
    
    // Calculate spring force (Hooke's law)
    const dx = cardTopCenter.x - anchorX;
    const dy = cardTopCenter.y - anchorY;
    
    // Apply spring force
    const springForceX = -dx * stiffness;
    const springForceY = -dy * stiffness;
    
    // Update velocity (F = ma)
    velX += springForceX / mass * deltaTime;
    velY += springForceY / mass * deltaTime;
    
    // Apply damping
    velX *= damping;
    velY *= damping;
    
    // Update position
    posX += velX * 60 * deltaTime;
    posY += velY * 60 * deltaTime;
    
    // Boundary checks
    posX = Math.max(0, Math.min(posX, window.innerWidth - card.offsetWidth));
    posY = Math.max(0, Math.min(posY, window.innerHeight - card.offsetHeight));
    
    card.style.left = posX + 'px';
    card.style.top = posY + 'px';
    
    updateLanyard();
    
    // Continue animation if still moving
    if (Math.abs(velX) > 0.1 || Math.abs(velY) > 0.1) {
        animationId = requestAnimationFrame(animate);
    }
}

// Initialize
updateLanyard();
animate();

// Handle window resize
window.addEventListener('resize', () => {
    posX = Math.max(0, Math.min(posX, window.innerWidth - card.offsetWidth));
    posY = Math.max(0, Math.min(posY, window.innerHeight - card.offsetHeight));
    card.style.left = posX + 'px';
    card.style.top = posY + 'px';
    updateLanyard();
});
</script>

</body>
</html>