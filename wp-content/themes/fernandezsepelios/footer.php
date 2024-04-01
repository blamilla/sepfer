<!-- footer -->
<footer>
    <div class="footer">
        <div class="footerMenu col-4">
            <span class="footerTitulo">
                Menú
            </span>            
            <?php that_footer_menu(); ?>     
        </div>
        <div class="footerLogo col-4">
            <div class="logo">
                <a href="<?php echo esc_url( home_url() ); ?>">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-white.png">
                </a>
            </div>
        </div>
        <div class="footerContacto col-4">
            <span class="footerTitulo">
                Contacto
            </span>
            <div class="footerTexto">
                <p>
                <strong>Dirección</strong>
                <br>
                <?php echo get_field('direccion', 'option'); ?>
                <br>
                <?php echo get_field('localidad', 'option'); ?>
                <br>
                <strong>Teléfono</strong>
                <br>
                <?php echo get_field('telefono', 'option'); ?>
                <br>
                <strong>Email</strong>
                <br>
                <a href="mailto:<?php echo get_field('email', 'option'); ?>"><?php echo get_field('email', 'option'); ?></a>
                <br>
                <strong>Horario</strong>
                <br>
                <?php echo get_field('horario', 'option'); ?>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->

</div>
<!-- /wrapper -->

<?php wp_footer(); ?>

<!-- analytics -->
<?php echo get_field('google_analytics','option'); ?>

</body>

</html>