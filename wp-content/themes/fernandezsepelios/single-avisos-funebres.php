<?php get_header(); ?>

<?php if( have_posts() ) :  while (have_posts()) : the_post(); ?>

<section class="aviso-funebre post-<?php the_ID(); ?>">
    <div class="avisoFunebrePostContainer">        
        <span class="tituloSeccion">
            Avisos Fúnebres
        </span>
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/firulete.svg" />
        <div class="avisoFunebrePost">
            <div class="avisoFunebrePostImagen col-5">
                <?php echo the_post_thumbnail(); ?>                
            </div>
            <div class="avisoFunebrePostInfo col-7">
                <div class="avisoFunebrePostTitulo">
                    <h1><?php echo the_title(); ?></h1>                
                </div>
                <div class="avisoFunebrePostFecha">
                    <span class="avisoFunebreIconoReligion">
                        +
                    </span>
                    <?php echo the_date(); ?>
                </div>
                <div class="avisoFunebrePostTexto">
                    <?php echo the_content(); ?>
                </div>
                <div class="avisoFunebrePostDeParte">
                    <?php echo the_field('de_parte_de'); ?>       
                </div>
            </div>
        </div>        
    </div>     
    <?php comments_template(); ?>
</section>

<?php endwhile; else : ?>
<p><?php _e( 'Ups, no hay información para mostrar.' ); ?></p>
<?php  endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>