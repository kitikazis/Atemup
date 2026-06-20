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
            <img class="map-svg" src="<?= asset('img/peru-map.svg') ?>" alt="Mapa del Perú" loading="lazy">
        </div>
    </div>
</section>

<!-- ===================== Sobre Nosotros ===================== -->
<section class="about" id="institucional">
    <div class="about-grid">
        <div class="about-media">
            <img src="<?= asset('img/sobren_nosotros_atemup.jpg') ?>" alt="Equipo ATEMUP" loading="lazy">
        </div>
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
    </div>
</section>

<!-- ===================== Nuestra Metodología =============== -->
<section class="method">
    <div class="method-inner">
        <div class="section-eyebrow method-eyebrow">Nuestra Metodología</div>
        <div class="method-card">
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
            <img class="home-service-img" src="<?= asset('img/consulta.png') ?>" alt="Asesoría" loading="lazy">
            <h3>Asesoría</h3>
            <p>Brindamos asesoría especializada en gestión pública, planificación estratégica y mejora institucional.</p>
        </div>
        <div class="home-service-card">
            <img class="home-service-img" src="<?= asset('img/consultoria.png') ?>" alt="Consultoría" loading="lazy">
            <h3>Consultoría</h3>
            <p>Consultoría técnica aplicada en diseño y evaluación de proyectos. Soluciones sostenibles y normadas.</p>
        </div>
        <div class="home-service-card">
            <img class="home-service-img" src="<?= asset('img/apoyo.png') ?>" alt="Asistencia Técnica" loading="lazy">
            <h3>Asistencia Técnica</h3>
            <p>Ofrecemos asistencia técnica continua para fortalecer capacidades institucionales y operativas.</p>
        </div>
    </div>
</section>

<!-- ===================== Aliados =========================== -->
<section class="allies">
    <h2 class="allies-title">Aliados Estratégicos</h2>
    <div class="allies-grid">
        <img src="<?= asset('img/mef.jpg') ?>" alt="Ministerio de Economía y Finanzas" loading="lazy">
        <img src="<?= asset('img/minedu.png') ?>" alt="Ministerio de Educación" loading="lazy">
        <img src="<?= asset('img/proinversion.png') ?>" alt="ProInversión" loading="lazy">
        <img src="<?= asset('img/san_marcos.jpg') ?>" alt="Universidad Nacional Mayor de San Marcos" loading="lazy">
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
