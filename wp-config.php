<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wp-first-course');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>i#mU[O!D@rKJ7P8$T^OBXs1DFF~w~P6OT p6K72FlgzG9G-Nd=)(<x<Po/SoVoU');
define('SECURE_AUTH_KEY',  'Iz*,lZ/RbFlNA&D^ ImZ8VCSF|f.H`.72}0Zc- q$CPX^hu@166=DGba`:Ny!r&<');
define('LOGGED_IN_KEY',    ';Kug;w@DY?+zZSYfEABc!1v%yj:R3CE;:`b OOsf~ml kII3p C2nz?`@UP[h]D{');
define('NONCE_KEY',        'Pg`9.s9z{lTu}wFbSz~[4|&311dsZICpweNUc^F%O=IdPE.w^ATsEYL+@mxgS&dQ');
define('AUTH_SALT',        '8eV*r&nvCLpp@V5kbQN%]w)LO@,vlfNo)rtOsWSs))YK+*-^mq4YPEzXJ;y[G2`F');
define('SECURE_AUTH_SALT', 'Qaq^kLh^Fz<HkQuF]KF]0ab`{0S}s-09no,M$Q`7lOgY<B,Ci2IJ]k.tMdolAVS]');
define('LOGGED_IN_SALT',   '2&76$`cA,F6UJd32+x6dd|akjxECA%I:x6aY@vZe&6#/LoSG,FQptbYq^(yY|+( ');
define('NONCE_SALT',       ');cF?:;s>P:oNGil?HXYB8@lJ@T/Zx_CvCVyNmMu1te?S+OEq4Hhu~{z1{B`=l49');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');