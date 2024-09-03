<?php
session_start();
function getNomCategorie($slug)
{
	global $pdo;
	$categorie = $pdo->prepare('SELECT nom FROM categories WHERE slug_categorie = ?');
	$categorie->execute([$slug]);

	$categorie = $categorie->fetchColumn();
	return $categorie;
}

function securisation($data)
{
	$data = htmlspecialchars($data);

	return $data;
}

function creer_slug($nom_categorie)
{
	// Convertir en minuscules
	$slug = strtolower($nom_categorie);

	// Remplacer les espaces par des tirets
	$slug = str_replace(' ', '-', $slug);

	// Supprimer les caractères spéciaux (à adapter selon tes besoins)
	$slug = preg_replace('/[^a-z0-9-]/', '', $slug);

	return $slug;
}


function contentTraitment($content, $longueurMax = 100)
{
	if (strlen($content) > $longueurMax) {
		return substr($content, 0, $longueurMax) . '...';
	} else {
		return $content;
	}
}
