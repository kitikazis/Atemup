<?php /** Vista: Inicio */ ?>
<section class="hero" id="inicio">
    <div class="hero-content">
        <div class="hero-subtitle">INNOVACIÓN EN GESTIÓN PÚBLICA</div>
        <h1 class="hero-title">
            Transformamos<br>
            Municipalidades<br>
            con <span class="highlight">Rigor Técnico.</span>
        </h1>
        <a class="hero-btn" href="<?= url('servicios') ?>">Explorar Servicios</a>
    </div>

    <div class="hero-image">
        <div class="map-container">
            <svg class="map-svg" viewBox="0 0 400 500" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <style>
                        .map-fill { fill: #2d3e50; stroke: #1e293b; stroke-width: 2; }
                        .connection-line { stroke: #ef4444; stroke-width: 2; fill: none; opacity: 0.6; }
                        .location-dot { fill: #ef4444; r: 6; }
                    </style>
                </defs>
                <path class="map-fill" d="M 80 50 L 180 40 L 200 80 L 220 100 L 230 150 L 250 200 L 240 260 L 200 300 L 150 320 L 100 310 L 70 270 L 60 200 L 50 150 Z"/>
                <line class="connection-line" x1="150" y1="120" x2="200" y2="200"/>
                <line class="connection-line" x1="150" y1="120" x2="230" y2="150"/>
                <line class="connection-line" x1="150" y1="120" x2="180" y2="280"/>
                <line class="connection-line" x1="200" y1="200" x2="240" y2="260"/>
                <line class="connection-line" x1="180" y1="280" x2="120" y2="290"/>
                <circle class="location-dot" cx="150" cy="120"/>
                <circle class="location-dot" cx="200" cy="200"/>
                <circle class="location-dot" cx="230" cy="150"/>
                <circle class="location-dot" cx="180" cy="280"/>
                <circle class="location-dot" cx="240" cy="260"/>
                <circle class="location-dot" cx="120" cy="290"/>
                <circle class="location-dot" cx="80" cy="200"/>
            </svg>
        </div>
    </div>
</section>
