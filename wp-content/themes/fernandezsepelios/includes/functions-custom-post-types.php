<?php


/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/


// Create Post Types
add_action('init', 'that_custom_post_types');

function that_custom_post_types() 
{
	$labels = array(
		'name'               => _x( 'Avisos Fúnebres', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Aviso Fúnebre', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Avisos Fúnebres', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Item', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Agregar Nuevo', 'model', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Agregar Nuevo Aviso Fúnebre', 'your-plugin-textdomain' ),
		'new_item'           => __( 'Nuevo Aviso Fúnebre', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Editar Aviso Fúnebre', 'your-plugin-textdomain' ),
		'view_item'          => __( 'Ver Aviso Fúnebre', 'your-plugin-textdomain' ),
		'all_items'          => __( 'Todos los Avisos Fúnebres', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Buscar Avisos Fúnebres', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Items:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No se han encontrado avisos fúnebres.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No se han encontrado avisos fúnebres en la papelera.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'avisos-funebres', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'menu_icon'			 => 'dashicons-index-card',
		'supports'           => array( 'title', 'editor','thumbnail','comments'  )
	);

	register_post_type( 'avisos-funebres', $args );

	/***** Duelo *****/
	$labels = array(
		'name'               => _x( 'Duelo', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Duelo', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Duelo', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Item', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Agregar Artículo', 'model', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Agregar Artículo', 'your-plugin-textdomain' ),
		'new_item'           => __( 'Nuevo Artículo', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Editar Artículo', 'your-plugin-textdomain' ),
		'view_item'          => __( 'Ver Artículo', 'your-plugin-textdomain' ),
		'all_items'          => __( 'Todos los artículos', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Buscar artículos', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Items:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No se han encontrado artículos.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No se han encontrado artículos en la papelera.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'duelo', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'			 => 'dashicons-calendar-alt',
		'supports'           => array( 'title', 'editor', 'thumbnail')
	);

	register_post_type( 'duelo', $args );



	
}