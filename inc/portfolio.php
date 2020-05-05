<?php
/**
 * CUSTOM POST TYPE
 * TYPE DE CONTENU PERSONNALISE
 * Register a custom post type called "portfolio".
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @see get_post_type_labels() for label keys.
 */
function portfolio_cpt()
{
	$labels = array(
		'name' => _x('Portfolio', 'Post type general name', 'themeblanc'),
		'singular_name' => _x('Portfolio', 'Post type singular name', 'themeblanc'),
		'menu_name' => _x('Portfolios', 'Admin Menu text', 'themeblanc'),
		'name_admin_bar' => _x('Portfolio', 'Ajouter un nouveau on Toolbar', 'themeblanc'),
		'add_new' => __('Ajouter un nouveau', 'themeblanc'),
		'add_new_item' => __('Ajouter un nouveau Portfolio', 'themeblanc'),
		'new_item' => __('New Portfolio', 'themeblanc'),
		'edit_item' => __('Editer Portfolio', 'themeblanc'),
		'view_item' => __('Voir Portfolio', 'themeblanc'),
		'all_items' => __('Tous les Portfolios', 'themeblanc'),
		'search_items' => __('Rechercher Portfolios', 'themeblanc'),
		'parent_item_colon' => __('Parent Portfolios:', 'themeblanc'),
		'not_found' => __('Aucun portfolios trouvé.', 'themeblanc'),
		'not_found_in_trash' => __('Aucun portfolios trouvé dans la poubelle.', 'themeblanc'),
		'featured_image' => _x('Portfolio Image de couverture', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'themeblanc'),
		'set_featured_image' => _x('Définir image de couverture', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'themeblanc'),
		'remove_featured_image' => _x('Supprimer image de couverture', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'themeblanc'),
		'use_featured_image' => _x('Utiliser comme image de couverture', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'themeblanc'),
		'archives' => _x('Portfolio archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'themeblanc'),
		'insert_into_item' => _x('Insert into portfolio', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'themeblanc'),
		'uploaded_to_this_item' => _x('Envoyé dans portfolio', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'themeblanc'),
		'filter_items_list' => _x('Filtrer la liste des portfolios', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'themeblanc'),
		'items_list_navigation' => _x('Pagination des Portfolios', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'themeblanc'),
		'items_list' => _x('Liste des Portfolios', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'themeblanc'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'portfolio'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 2,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
	);
	register_post_type('portfolio', $args);
}
add_action('init', 'portfolio_cpt');