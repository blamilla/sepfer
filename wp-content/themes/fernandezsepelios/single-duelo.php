<?php get_header(); ?>

<?php if( have_posts() ) :  while (have_posts()) : the_post(); ?>

<section class="duelo post-<?php the_ID(); ?>">
    <div class="dueloPostContainer">        
        <span class="tituloSeccion">
            Tratamiento del duelo
        </span>
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/firulete.svg" />
        <div class="dueloPostInfo">
            <div class="contenidoPost col-7">
                <div class="dueloPostTitulo">
                    <h1><?php echo the_title(); ?></h1>                
                </div>
                <div class="dueloPostIntroTexto">
                    <?php echo the_field("intro_texto_duelo"); ?>
                </div>
                <div class="dueloPostFecha">
                    <?php echo the_date(); ?>
                </div>
                <div class="dueloPostImagen">
                    <?php echo the_post_thumbnail(); ?>
                </div>
                <div class="dueloPostContenido">
                    <?php echo the_content(); ?>       
                </div>
            </div>
            <div class="otrosArticulosContainer col-5">
                <span class="otrosArticulosTitulo">
                    Otros artículos
                </span>
                <hr>
                <?php 
                    $currentID = get_the_ID();
                    $args = array(
                        'post_type' => 'duelo',
                        'post_status' => 'publish',
                        //'posts_per_page' => 3,	
                        'post__not_in' => array($currentID),
                        'orderby' => 'date',
                        'order'   => 'DESC',
                        //'meta_type' => 'NUMERIC',
                        //'meta_key'	 => 'posicion',
                        //'orderby' => 'meta_value',
                        //'order'   => 'ASC',					
                    );
                            
                    $my_query = new WP_Query($args); 
                ?>
                <?php if( $my_query->have_posts() ):while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <?php get_template_part( 'loop', 'otros-articulos-duelo' ); ?>
                <?php endwhile; else : ?>
                    <p><?php  _e( 'No se han encontrado ítems para esta sección.' ); ?></p>
                <?php  endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>        
    </div>
</section>

<?php endwhile; else : ?>
<p><?php _e( 'Ups, no hay información para mostrar.' ); ?></p>
<?php  endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>