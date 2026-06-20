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
