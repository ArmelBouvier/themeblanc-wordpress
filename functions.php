<?php // Fonctions pour le thème

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

/*
 * Lien utiles
 * https://developer.wordpress.org/themes/basics/template-hierarchy/
 * https://codex.wordpress.org/Theme_Development
 */