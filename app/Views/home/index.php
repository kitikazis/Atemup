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

<!-- ===================== Sobre Nosotros ===================== -->
<section class="about" id="institucional">
    <div class="about-grid">
        <div class="about-text">
            <div class="section-eyebrow">SOBRE NOSOTROS</div>
            <p>
                ATEMUP está conformada por profesionales con experiencia en gestión pública,
                políticas públicas y evaluación de programas, que han trabajado directamente
                con gobiernos locales, entidades del Estado y organizaciones vinculadas al
                sector público.
            </p>
            <p>
                Nuestro trabajo se orienta a fortalecer la capacidad institucional de las
                municipalidades, apoyándolas en el cumplimiento de exigencias técnicas y
                normativas, la mejora de sus procesos de gestión y la toma de decisiones
                basada en evidencia.
            </p>
            <h3 class="about-subtitle">Nuestra labor se basa en:</h3>
            <ul class="about-list">
                <li>Rigor técnico</li>
                <li>Claridad metodológica</li>
                <li>Comprensión del contexto institucional y normativo</li>
                <li>Acompañamiento cercano, responsable y orientado a resultados</li>
            </ul>
        </div>

        <div class="method-card">
            <h3 class="method-card-title">Nuestra Metodología</h3>
            <ol class="method-steps">
                <li><span class="method-num">1</span> Diagnóstico</li>
                <li><span class="method-num">2</span> Asistencia</li>
                <li><span class="method-num">3</span> Planificación</li>
                <li><span class="method-num">4</span> Cumplimiento</li>
            </ol>
            <div class="method-result">Municipalidad con Resultados</div>
        </div>
    </div>
</section>

<!-- ===================== Contadores ======================== -->
<section class="stats">
    <div class="stats-grid">
        <div class="stat">
            <div class="stat-num" data-target="50" data-suffix="+">0</div>
            <div class="stat-label">Proyectos</div>
        </div>
        <div class="stat">
            <div class="stat-num" data-target="100" data-suffix="%">0</div>
            <div class="stat-label">Rigor Técnico</div>
        </div>
        <div class="stat">
            <div class="stat-num" data-target="24" data-suffix="/7">0</div>
            <div class="stat-label">Asistencia Continua</div>
        </div>
    </div>
</section>

<!-- ===================== Nuestros Servicios ================ -->
<section class="home-services">
    <div class="home-services-head">
        <div class="section-eyebrow">Nuestros Servicios</div>
        <p class="home-services-desc">
            Soluciones especializadas para fortalecer capacidades institucionales
            y optimizar la gestión municipal.
        </p>
        <a class="hero-btn" href="<?= url('contacto') ?>">Agendar Consultoría</a>
    </div>

    <div class="home-services-grid">
        <div class="home-service-card">
            <div class="home-service-icon">🧭</div>
            <h3>Asesoría</h3>
            <p>Brindamos asesoría especializada en gestión pública, planificación estratégica y mejora institucional.</p>
        </div>
        <div class="home-service-card">
            <div class="home-service-icon">📐</div>
            <h3>Consultoría</h3>
            <p>Consultoría técnica aplicada en diseño y evaluación de proyectos. Soluciones sostenibles y normadas.</p>
        </div>
        <div class="home-service-card">
            <div class="home-service-icon">🛠️</div>
            <h3>Asistencia Técnica</h3>
            <p>Ofrecemos asistencia técnica continua para fortalecer capacidades institucionales y operativas.</p>
        </div>
    </div>
</section>

<!-- ===================== Noticias ========================== -->
<section class="home-news">
    <div class="section-title">
        <h2>Noticias</h2>
        <p>Mantente al día con las novedades y publicaciones de ATEMUP.</p>
    </div>
    <div style="text-align:center;">
        <a class="hero-btn" href="<?= url('noticias') ?>">Ver todas las noticias</a>
    </div>
</section>

<!-- ===================== Boletín =========================== -->
<section class="newsletter">
    <div class="newsletter-box">
        <h2>Suscríbete al boletín</h2>
        <p>Recibe nuevas publicaciones en tu bandeja de entrada.</p>
        <form class="newsletter-form" action="<?= url('contacto') ?>" method="get">
            <input type="email" name="email" class="newsletter-input" placeholder="Correo electrónico" required>
            <button type="submit" class="newsletter-btn">Suscribir</button>
        </form>
    </div>
</section>
