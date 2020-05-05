<?php // Fonctions pour le thème
//ajout des miniatures sur les articles
add_theme_support('post-thumbnails');
// Déclaration des feuilles de style et js
function declaration_scripts_theme()
{
	// Déclare les JS
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js', '', '', true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', '', '', true);
	wp_enqueue_script('app', get_template_directory_uri() . '/js/app.js', '', '', true);
	// Déclare les CSS
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css');
	wp_enqueue_style('app', get_template_directory_uri() . '/css/app.css');
}
add_action('wp_enqueue_scripts', 'declaration_scripts_theme');
// Import du fichier CPT (custom post type) portfolio
include_once 'inc/portfolio.php';
// Import du fichier metabox pour ajouter un champ personnalisé supplémentaire
include_once 'inc/metabox_portfolio.php';

// Déclarer l'utilisation des widgets
add_action('widgets_init', 'widget_footer');
function widget_footer()
{
	register_sidebar([
		'name'          => __('zone de Widget', 'themeblanc'),
		'id'            => 'zone-footer',
		'description'   => 'Zone dédiée aux widgets footer',
		'class'         => 'widget-footer',
		'before_widget' => '<div id="1%s" class="%2$s col">',
		// lien pour les sprintf https://www.php.net/manual/fr/function.sprintf.php
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>'
		]);
}

add_filter('dynamic_sidebar_params', 'change_before_widget');
function change_before_widget($params){
	$sidebar_id = $params[0]['id'];
	if ($sidebar_id === 'zone-footer'){
		$total_widget = wp_get_sidebars_widgets();
		$sidebar_widget = count($total_widget[$sidebar_id]);

		$params[0]['before_widget'] = str_replace('class="',
			'class="col-md-' . floor(12 / $sidebar_widget) . ' ',
			$params[0]['before_widget']);
	}
	return $params;
}

/*
 * Lien utiles
 * https://developer.wordpress.org/themes/basics/template-hierarchy/
 * https://codex.wordpress.org/Theme_Development
 */