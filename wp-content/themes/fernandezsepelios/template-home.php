<?php 
    /* Template Name: Template Inicio */ 
    get_header(); 
?>
 <section class="bannerSection">
     <?php if(get_field("texto_banner")): ?>
    <div class="bannerTextoContainer">
        <span class="bannerTexto">
            <?php echo get_field("texto_banner"); ?>
        </span>
    </div>
    <?php endif; ?>
</section>
<section id="institucional" class="institucionalSection espaciado">
    <div class="institucionalContainer">
        <div class="institucionalInfo">
            <div class="institucionalLogo">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-completo.png">
            </div>
            <?php if( get_field("texto_lema") ): ?>
            <div class="institucionalLema">
                <span>
                    <?php echo get_field("texto_lema"); ?>
                </span>
            </div>
            <?php endif; ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/firulete.svg" />
            <div class="textoSeccion">
                <span>
                    <?php echo get_field("texto_descripcion_empresa"); ?>
                </span>
            </div>
        </div>
        <div class="institucionalItemsInfo">
            <div class="institucionalMision col-4 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                <div class="tab">
                    <button class="tablinks" onclick="abrirTab(event, 'tab1')" id="defaultTab">
                        <?php echo the_field("titulo_pestana_1"); ?>
                    </button>
                    <button class="tablinks" onclick="abrirTab(event, 'tab2')">
                        <?php echo the_field("titulo_pestana_2"); ?>
                    </button>
                    <button class="tablinks" onclick="abrirTab(event, 'tab3')">
                        <?php echo the_field("titulo_pestana_3"); ?>
                    </button>
                    <button class="tablinks" onclick="abrirTab(event, 'tab4')">
                        <?php echo the_field("titulo_pestana_4"); ?>
                    </button>
                </div>

                <!-- Tab content -->
                <div id="tab1" class="tabcontent">
                    <?php echo the_field("texto_pestana_1"); ?>
                </div>

                <div id="tab2" class="tabcontent">
                    <?php echo the_field("texto_pestana_2"); ?>
                </div>

                <div id="tab3" class="tabcontent">
                    <?php echo the_field("texto_pestana_3"); ?>
                </div>

                <div id="tab4" class="tabcontent">
                    <?php echo the_field("texto_pestana_4"); ?>
                </div>
                
                <script>
                    document.getElementById("defaultTab").click();

                    function abrirTab(evt, cityName) {
                        // Declare all variables
                        var i, tabcontent, tablinks;

                        // Get all elements with class="tabcontent" and hide them
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }

                        // Get all elements with class="tablinks" and remove the class "active"
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }

                        // Show the current tab, and add an "active" class to the button that opened the tab
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";
                    }
                </script>
            </div>            
            <div class="institucionalImg col-4 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1s">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/Flower_Box.png" />
            </div>
            <div class="institucionalServicios col-4 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1.5s">
                <span>
                    Aquí encontrará información sobre:
                </span>
                <?php institucional_menu(); ?>                
            </div>
        </div>
    </div>   
</section>
<section class="instalacionesSection">
    <div class="instalacionesContainer">
        <div class="col-6 instalacionesImagen">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/DSC_0015.jpg" />
        </div>
        <div class="col-6 instalacionesTexto">
            <div class="instalacionesTextoContainer espaciado">
                <div class="tituloSeccion">
                    <?php echo the_field('titulo_instalaciones'); ?>
                </div>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/firulete.svg" />
                <div class="textoSeccion">
                    <?php echo the_field('texto_instalaciones'); ?>
                </div>
                <button class="boton">
                    <a href="instalaciones"><?php echo the_field('texto_boton_instalaciones'); ?></a>
                </button>
            </div>
        </div>
    </div>
</section>
<section id="avisosFunebres" class="avisosFunebresSection espaciado">
    <div class="avisosContainer">
        <div class="tituloSeccion">
            <?php echo the_field('titulo_avisos_funebres'); ?>
        </div>
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/firulete.svg" />
        <div class="avisosCajas">
            <ul class="listaAvisos">
                <?php 
                    $args = array(
                        'post_type' => 'avisos-funebres',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order'   => 'DESC',                    				
                    );
                            
                    $my_query = new WP_Query($args); 
                ?>
                <?php if( $my_query->have_posts() ):while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <?php get_template_part( 'loop', 'aviso-funebre' ); ?>
                <?php endwhile; else : ?>
                    <p><?php  _e( 'No se han encontrado avisos fúnebres' ); ?></p>
                <?php  endif; ?>
                <?php wp_reset_query(); ?>
            </ul>
        </div>
        <button class="boton">
            <a href="avisos-funebres">
                <?php echo get_field('boton_avisos_funebres'); ?>
            </a>
        </button>
    </div>
</section>
<section class="tratamientoDueloSection espaciado">
    <div class="tratamientoDueloContainer">
        <div class="tituloSeccion">
            <?php echo the_field('titulo_tratamiento_duelo'); ?>
        </div>
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/firulete.svg" />
        <div class="textoSeccion">
            <?php echo the_field("texto_tratamiento_duelo"); ?>
        </div>
        <div class="duelosCajas">        
            <ul class="listaDuelos">
                <?php 
                    $args = array(
                        'post_type' => 'duelo',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,	
                        'orderby' => 'date',
                        'order'   => 'DESC',                      			
                    );
                            
                    $my_query = new WP_Query($args); 
                ?>
                <?php if( $my_query->have_posts() ):while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <?php get_template_part( 'loop', 'duelo' ); ?>
                <?php endwhile; else : ?>
                    <p><?php  _e( 'No se han encontrado ítems para esta sección.' ); ?></p>
                <?php  endif; ?>
                <?php wp_reset_query(); ?>
            </ul>        
        </div>
        <button class="boton">
            <a href="duelo">
                <?php echo the_field('boton_tratamiento_duelo'); ?>
            </a>
        </button>
    </div>
</section>
<section class="contactoSection" id="contacto">
    <div class="contactoContainer">
        <div class="col-6 formularioContactoContainer espaciado">
            <div class="tituloSeccion">
                <?php echo the_field('titulo_contacto'); ?>
            </div>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/firulete.svg" />
            <div class="formularioContacto">
                <?php echo do_shortcode( '[contact-form-7 id="60" title="Contacto Home"]' ); ?>
            </div>
        </div>
        <div class="col-6 contactoMapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13106.953824084898!2d-58.40764!3d-34.787359!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4ba5da4654b27cb2!2sFern%C3%A1ndez+Sepelios!5e0!3m2!1ses-419!2sar!4v1562577962808!5m2!1ses-419!2sar" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>            
        </div>
    </div>
</section>

<?php get_footer(); ?>