/* ============================================================
   ATEMUP - Interactividad del sitio (JavaScript puro)
   Reemplaza el framework del constructor visual original.
   ============================================================ */

document.addEventListener('DOMContentLoaded', function () {

    /* -------- Noticias: pestañas (tabs) -------------------- */
    const tabLinks = document.querySelectorAll('[data-tab]');
    if (tabLinks.length) {
        tabLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const tabName = link.getAttribute('data-tab');

                tabLinks.forEach(function (l) { l.classList.remove('active'); });
                link.classList.add('active');

                document.querySelectorAll('.tab-content').forEach(function (c) {
                    c.style.display = 'none';
                });
                const selected = document.getElementById(tabName);
                if (selected) { selected.style.display = 'block'; }
            });
        });
    }

    /* -------- Contacto: contador de caracteres ------------- */
    const textarea = document.querySelector('.form-textarea');
    const charCount = document.getElementById('charCount');
    if (textarea && charCount) {
        const update = function () { charCount.textContent = textarea.value.length; };
        textarea.addEventListener('input', update);
        update();
    }

    /* -------- Inicio: contadores animados ------------------ */
    const stats = document.querySelectorAll('.stat-num');
    if (stats.length) {
        const animate = function (el) {
            const target = parseInt(el.getAttribute('data-target'), 10) || 0;
            const suffix = el.getAttribute('data-suffix') || '';
            const duration = 1500;
            const start = performance.now();
            const step = function (now) {
                const progress = Math.min((now - start) / duration, 1);
                el.textContent = Math.floor(progress * target) + suffix;
                if (progress < 1) { requestAnimationFrame(step); }
            };
            requestAnimationFrame(step);
        };

        if ('IntersectionObserver' in window) {
            const obs = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        animate(entry.target);
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.4 });
            stats.forEach(function (s) { obs.observe(s); });
        } else {
            stats.forEach(animate);
        }
    }

    /* -------- Botón "volver arriba" ------------------------ */
    const scrollTop = document.getElementById('scrollTop');
    if (scrollTop) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) {
                scrollTop.classList.add('visible');
            } else {
                scrollTop.classList.remove('visible');
            }
        });
        scrollTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

});
