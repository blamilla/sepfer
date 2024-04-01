<div class="otrosDuelosInfo">
    <div class="otrosDuelosInfoDetalles">
        <span class="dueloPostTitulo">
            <?php echo the_title(); ?>
        </span>
        <div class="otrosDuelosIntroTexto">
            <?php echo the_field('intro_texto_duelo'); ?>
            <span class="otrosDuelosLeerMas">
                <a href="<?php the_permalink(); ?>">
                    Leer Más...
                </a>
            </span>
        </div>
        <span class="otrosDuelosFecha">
            <?php echo get_the_date(); ?>
        </span>                                                        
    </div>
</div>
<hr>