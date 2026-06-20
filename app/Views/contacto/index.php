<?php
/**
 * Vista: Contacto.
 * Variables: $exito (string|null), $errores (array campo=>mensaje)
 */
$errores = $errores ?? [];
?>
<section class="hero-contacto" id="contacto">
    <h1 class="hero-contacto-title">Contáctanos</h1>
    <p class="hero-contacto-desc">
        Nos encantaría saber de ti. Contáctanos para cualquier consulta
    </p>
</section>

<section class="contacto-section">
    <div class="contacto-container">
        <div class="map-container">
            <iframe
                title="Ubicación ATEMUP"
                src="https://www.google.com/maps?q=Lima%20Per%C3%BA&output=embed"
                width="100%" height="100%" style="border:0;" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="info-container">
            <h2 class="info-title">Oficina Central</h2>

            <div class="info-item">
                <div class="info-icon"><?= icon('pin') ?></div>
                <div class="info-text"><?= e(SITE_ADDRESS) ?></div>
            </div>

            <div class="info-item">
                <div class="info-icon"><?= icon('phone') ?></div>
                <div class="info-text">
                    <a href="tel:<?= preg_replace('/\s+/', '', SITE_PHONE) ?>"><?= e(SITE_PHONE) ?></a>
                    | <a href="tel:<?= preg_replace('/\s+/', '', SITE_PHONE_2) ?>"><?= e(SITE_PHONE_2) ?></a>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon"><?= icon('mail') ?></div>
                <div class="info-text">
                    <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon"><?= icon('pin') ?></div>
                <div class="info-text"><?= e(SITE_CITY) ?></div>
            </div>
        </div>
    </div>
</section>

<section class="contacto-section" style="background: transparent; padding: 60px 60px 40px;">
    <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);">
        <div class="form-section">
            <h2 class="form-title">Envía tu mensaje</h2>

            <?php if (!empty($exito)): ?>
                <div class="alert alert-success"><?= e($exito) ?></div>
            <?php endif; ?>

            <?php if (!empty($errores)): ?>
                <div class="alert alert-error">Por favor corrige los campos marcados.</div>
            <?php endif; ?>

            <form action="<?= url('contacto') ?>" method="post" novalidate>
                <div class="form-group">
                    <label class="form-label">Nombres <span class="required">*</span></label>
                    <input type="text" name="nombres" class="form-input" placeholder="Ingresa tus nombres" value="<?= old('nombres') ?>">
                    <?php if (isset($errores['nombres'])): ?><div class="field-error"><?= e($errores['nombres']) ?></div><?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Apellidos <span class="required">*</span></label>
                    <input type="text" name="apellidos" class="form-input" placeholder="Ingresa tus apellidos" value="<?= old('apellidos') ?>">
                    <?php if (isset($errores['apellidos'])): ?><div class="field-error"><?= e($errores['apellidos']) ?></div><?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Email <span class="required">*</span></label>
                    <input type="email" name="email" class="form-input" placeholder="Ingresa tu email" value="<?= old('email') ?>">
                    <?php if (isset($errores['email'])): ?><div class="field-error"><?= e($errores['email']) ?></div><?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Celular <span class="required">*</span></label>
                    <input type="tel" name="celular" class="form-input" placeholder="Ingresa tu celular" value="<?= old('celular') ?>">
                    <?php if (isset($errores['celular'])): ?><div class="field-error"><?= e($errores['celular']) ?></div><?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Mensaje <span class="required">*</span></label>
                    <textarea name="mensaje" class="form-textarea" placeholder="Escribe tu mensaje..." maxlength="2000"><?= old('mensaje') ?></textarea>
                    <div class="char-count">Caracteres: <span id="charCount">0</span> / 2000</div>
                    <?php if (isset($errores['mensaje'])): ?><div class="field-error"><?= e($errores['mensaje']) ?></div><?php endif; ?>
                </div>

                <div class="form-checkbox">
                    <input type="checkbox" id="robot" name="robot" value="1">
                    <label for="robot">No soy un robot</label>
                </div>
                <?php if (isset($errores['robot'])): ?><div class="field-error" style="margin-bottom:20px;"><?= e($errores['robot']) ?></div><?php endif; ?>

                <button type="submit" class="btn-submit">Enviar Mensaje</button>
            </form>
        </div>
    </div>
</section>
