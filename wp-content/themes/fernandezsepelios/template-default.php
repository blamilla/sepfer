<?php 
    /* Template Name: Template Default */ 
    get_header(); 
?>

<section class="default-template">
    <div class="postContainer">
        <span class="tituloSeccion">
            <?php echo the_title(); ?>
        </span>
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/firulete.svg" />
        <div class="postContent">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php echo the_content(); ?>   
            <?php endwhile; endif; ?>    
        </div>
    </div>    
</section>
<section class="galeria">
    <div class="gallery-container">
        <?php 
            $images = get_field('galeria');

            if( $images ) : ?>
        <?php foreach( $images as $image ) : ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endforeach; ?>
        <?php endif; ?>

        <div class=" lightbox">
            <div class="title"></div>
            <div class="filter"></div>
            <div class="arrowr"></div>
            <div class="arrowl"></div>
            <div class="close"></div>
        </div>
    </div>
</section>

<?php get_footer(); ?>