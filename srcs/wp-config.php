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
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'admin' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'password' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define('AUTH_KEY',         '1w.{td{Fvnt8y=|;oq{G#d1a5.=m(Vui;U:0+9.#`jV|wGY_Yk99xdwuwpj~oiRo');
define('SECURE_AUTH_KEY',  'kP]- S=EZHD|uE|?#,qI]6Hs`Y/pn<QIdAPCviBFix::V+;,87%@-o~cX! K nYv');
define('LOGGED_IN_KEY',    '3CA31Ky0R-okXS|/j!?dd0^1=&1vVU*yDw,q~L8i!wLtPSsv21A$O2pjjMi4lt%z');
define('NONCE_KEY',        '%}D*w1kg2C%-nahs5A|c=?4VS54i!pG;V~N^m}l7-4-|4f+)5On{;ax-5qWZ-sX@');
define('AUTH_SALT',        '`L;!;- |O[+pn&k`ZITbk{T7IhsrfRzi(x~a63[;^:OFYHS#LVl[T%5fe,WyVdy9');
define('SECURE_AUTH_SALT', 'BExc7f3b^<&3Ku~QxNsqBlWgs9gjH<+]hjpSUXfeAfd&.S5U U+yLITSzaG=)NRy');
define('LOGGED_IN_SALT',   'n3hL-y8qCC+e6`@9xhLyN[(qJ6oV8uo!dewGzrZ=&4]6H5VOCK $HrU46? $]S3$');
define('NONCE_SALT',       ': j<X$1ut te)j&P1^7*~yu{-6;+8SS{V!2%2)d(?S6<vw8Su6nQeN]hyNAioi*g');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

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

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');