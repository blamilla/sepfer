<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' : '; } ?><?php bloginfo( 'name' ); ?>
    </title>

    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/touch.png"
        rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="theme-color" content="#0A3B22">

    <link rel="prefetch" as="font" type="font/ttf"
        href="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/BebasNeue-Regular.ttf" crossorigin>
    <link rel="prefetch" as="font" type="font/ttf"
        href="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/Montserrat-Regular.ttf" crossorigin>
    <link rel="prefetch" as="font" type="font/ttf"
        href="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/Montserrat-Bold.ttf" crossorigin>
    <link rel="prefetch" as="font" type="font/ttf"
        href="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/Lora-Regular.ttf" crossorigin>
    <link rel="prefetch" as="font" type="font/ttf"
        href="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/Lora-Bold.ttf" crossorigin>
    <link rel="prefetch" as="font" type="font/ttf"
        href="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/Lora-Italic.ttf" crossorigin>

    <?php wp_head(); ?>
    <?php 
		// Include minified CSS
		$that_crucial_css_path = get_template_directory() . "/_include/_php/that-crucial-css.php";
		require $that_crucial_css_path;
		?>

</head>

<body <?php body_class(); ?>>
    <?php if(get_field('whatsapp','option')): ?>
    <a href="https://wa.me/<?php echo get_field('whatsapp','option'); ?>" target="_blank" class="btn-telefono-home">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/whatsapp.svg">
    </a>       
    <?php endif; ?>
    <!-- wrapper -->
    <div class="wrapper">
        <section class="headerSection">
            <div class="col-12">
                <div class="col-6 headerInfoContainer">
                    <span class="headerInfo">
                        <?php echo get_field('frase_izquierda', 'option'); ?>
                    </span>
                </div>
                <div class="col-6 headerContactoContainer">
                    <div class="headerTelefono">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/icono_telefono.svg">
                        <span>
                        <?php echo get_field('telefono','option'); ?>
                        </span>
                    </div>
                    <div class="headerMail">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/icono_mail.svg">
                        <span>
                            <a href="mailto:<?php echo get_field('email','option'); ?>"><?php echo get_field('email','option'); ?></a>
                        </span>
                    </div>
                </div>
            </div>
        </section>
        <section class="topSection">
            <header class="header hide-mobile">
                <div class="menu">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url() ); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-small.png">   
                        </a>
                    </div>
                    <nav class="nav">
                        <?php header_menu(); ?>
                    </nav>
                </div>
            </header>
            <header class="header mobile clear hide-desktop" role="banner">
                <nav class="nav" role="navigation">
                    <div class="burger">
                        <span class="trans"></span>
                        <span class="trans"></span>
                        <span class="trans"></span>
                    </div>
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url() ); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-small.png">                            
                        </a>
                    </div>
                </nav>
                <div class="menu-mobile" style="display: none;">
                    <?php header_menu(); ?>
                </div>
            </header>
        </section>       
        <!-- /header -->