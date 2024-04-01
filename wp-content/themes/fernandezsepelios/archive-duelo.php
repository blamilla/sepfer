<?php get_header(); ?>

<main role="main" aria-label="Content">
    <!-- section -->
    <section class="content-wrapper tratamientoDueloSection">        
        <?php if (have_posts() ) : ?>
        <div class="projects-wrapper">
            <div class="grid-sizer"></div>
            <div class="tratamientoDueloContainer espaciado">
                <div class="tituloSeccion">
                    Tratamiento del Duelo
                </div>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/firulete.svg" />
              
                <div class="duelosCajas">
                <ul class="listaDuelos">
                        <?php while (  have_posts() ) : the_post(); get_template_part( 'loop', 'duelo' );   endwhile; ?>                        
                    </ul>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="no-results">
            <p>No hay elementos para mostrar</p><a href="<?php echo get_site_url() . '/duelo/' ?>" class="reset-filters">Reset
                Filters</a>
        </div>
        <?php endif; ?>
        <?php get_template_part( 'pagination' ); ?>
        <?php wp_reset_query(); ?>

    </section>
    <!-- /section -->
</main>

<?php get_footer(); ?>