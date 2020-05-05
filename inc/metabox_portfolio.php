<?php
/*
 * META BOX POUR AFFICHER DES CHAMPS SUPPLEMENTAIRES
 *  https://developer.wordpress.org/reference/functions/add_meta_box/
 */
add_action( 'add_meta_boxes', 'initialisation_metabox' );

function initialisation_metabox() {
	add_meta_box(
		'meta_portfolio', // id
		'Prix', // titre
		'formulaire_input', //fonction de callback
		'portfolio', // type de contenu où s'affiche la meta box
		'advanced', // contexte
		'default', // priorité
		'sauvegarde_input' // fonction pour enregistrer les champs
	);
}

function formulaire_input($post)
{
	$prix = get_post_meta($post->ID, '_prix', true);
	echo '<label for="prix">Prix du projet :</label>';
	echo '<input id="prix" name="prix" type="number" placeholder="Ajouter un prix" value="'.$prix.'"> €';
}

add_action( 'save_post', 'sauvegarde_input' );
function sauvegarde_input($post_id)
{
	if (isset($_POST['prix']) && is_numeric($_POST['prix'])){
		update_post_meta($post_id, '_prix', $_POST['prix']);
	}
}