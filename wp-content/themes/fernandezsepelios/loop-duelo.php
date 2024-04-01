<li class="dueloIndividual wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">
    <div class="duelosInfo">
        <div class="duelosImagen">
            <?php echo the_post_thumbnail();  ?>
        </div>
        <div class="duelosInfoDetalles">
            <div class="duelosInfoDetallesContainer">
                <span class="duelosFecha">
                    <?php echo the_date(); ?>
                </span>
                <span class="duelosTitulo">
                    <?php echo the_title(); ?>
                </span>                                        
                <p class="duelosTexto">
                    <?php printf( '%1$s', get_the_content() ); ?>
                </p>
                <div class="duelosLeerMas">
                    <div class="col-11">
                        <a href="<?php the_permalink(); ?>">
                            Leer Más
                        </a>
                    </div>
                    <div class="col-1">
                        <a href="<?php the_permalink(); ?>">
                            +
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>