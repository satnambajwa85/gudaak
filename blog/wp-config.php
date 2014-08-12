<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gudaak');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_[~[i`i6Pdc7*N|D,)baM->%r>wPG.uAOjQz1!,-B&12t|GH7 OOiVI?|;`~:S--');
define('SECURE_AUTH_KEY',  'z!Z>$`+*Exd@cOSYrEr:/|kgPXyU/|k~Mkqke1y,,a`J{?4.+nK_&)-xP;q0:!Vz');
define('LOGGED_IN_KEY',    '}0KNhmk!j2xyI<2o+&m7!+gh0LQ(OIgs(ae>a_X;;v9w(3cg9}GJaqb;9Wn&Q+;<');
define('NONCE_KEY',        '(G*P.$e4_OG`Q>!R%/-{#eyjqF#E`]<{E,ykDdDdX+ce |dGi#~9fNT@iJu!2KC@');
define('AUTH_SALT',        'Y3|+BTX{WNiOF?>K-5W]HI+-Vk=pSF%:_+SvVZ]!f<<UM|[~$,v~]K1{%P8&Sl{e');
define('SECURE_AUTH_SALT', '90/hFqgnd(|k~8%r]/M[!x,pb=x/zkReFP> QoFSAyr.hb64#s?y2}6& ?k^JrUe');
define('LOGGED_IN_SALT',   '^tCFRf*^<}40pRIJo9MN]b}; w&to|}kk1!+0%?<~|BXZ?!7HK++9sM:GD|&}-tT');
define('NONCE_SALT',       'K}9>onJGcF~V,:vg;#53[fIn|F%ZB?plp?.x0~sx#450rJ=5K&:i`+vMYRu}/Gp`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
