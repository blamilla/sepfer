<li class="avisoIndividual wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
    <a href="<?php echo get_the_permalink(); ?>">
        <div class="avisosInfo">
            <div class="avisosInfoDetalles">
                <div class="avisosInfoDetallesContainer">
                    <div class="avisosInfoDetallesTop">
                        <span class="avisosTitulo">
                            <?php the_title(); ?>
                        </span>
                        <span class="avisosFecha">
                            <?php echo the_field('fecha_aviso'); ?>
                        </span>
                        <p class="avisosTexto">
                            <?php echo wp_trim_words(get_the_content(), 20); ?>
                        </p>
                    </div>
                    <p class="avisosDeParteDe">
                        <span class="col-11">
                            <?php echo the_field('de_parte_de'); ?>
                        </span>
                        <span class="col-1">
                            +
                        </span>
                    </p>
                </div>
            </div>
            <div class="avisosImagen">
                <?php printf( '%1$s', the_post_thumbnail() );  ?>
            </div>
        </div>
    </a>
</li>