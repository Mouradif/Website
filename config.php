<?php
// Paramètres de connexionn à la base de données
define ("DB_HOST", "localhost");
define ("DB_NAME", "site");
define ("DB_USER", "root");
define ("DB_PASS", "root");

// Paramètres par défaut (Nom du site, Page d'accueil, Template choisit, langue, page d'erreur, URL)
define ("SITE_NAME", "Site");
define ("SITE_INDEX_USER", "accueil");
define ("SITE_INDEX_GUEST", "accueil");
define ("DEFAULT_LANG", "fr");

// Paramètres de l'application
$dir = array(
	"fr" => "ltr",
	"en" => "ltr",
	"de" => "ltr",
	"jp" => "ltr",
	"ko" => "ltr",
	"cn" => "ltr",
	"th" => "ltr",
	"sp" => "ltr",
	"it" => "ltr",
	"ar" => "rtl",
	"ru" => "ltr",
	);
$menu = array(
	"fr" => "Choix de la langue :",
	"en" => "Change Language:",
	"de" => "??",
	"jp" => "??",
	"ko" => "??",
	"cn" => "??",
	"th" => "??",
	"sp" => "??",
	"it" => "??",
	"ar" => "إختيار اللغة",
	"ru" => "??",
	);
?>