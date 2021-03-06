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
define('DB_NAME', 'ci');

/** MySQL database username */
define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));

/** MySQL database password */
define('DB_PASSWORD', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST') . ':' . getenv('OPENSHIFT_MYSQL_DB_PORT'));

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
define('AUTH_KEY',         '+^;SrN^I{1xm<sey&8U9nph2Dx2dn7fq+F4eZKlB#Ow5a/vf?<[bp@kZf+4XtoJv');
define('SECURE_AUTH_KEY',  '^QIef-pZX5Oma7U`Y|6?Abz50+BO+tKCiuk*$Z=oc2Pm(`-0Z]u?6f|&a+8EZ3k ');
define('LOGGED_IN_KEY',    'WDiOo#c<O<+6nNW-72yu[rZb5M&l|*ee?K|[nJ&^=y$c/N-+X~S(&T?}}Fpz-a/N');
define('NONCE_KEY',        'dL=P9 [yrkkw|P+LD~neWu`dj#t)XgV![>+% 8(W+riVR+9jDRlyhZ_F3*!Y3sq8');
define('AUTH_SALT',        '[*1?@/Iy}!lTal4o3+ok^obfd.EcLYDwF`z:q;PnAmDmK(vAEYsoc>ySx! fOZbZ');
define('SECURE_AUTH_SALT', 'v-z2UQ|?B~1PlyXAm |ZP4jAeV:w(*+{gN#-];d*KX^izJu+DA<a$--Z][)RtRqG');
define('LOGGED_IN_SALT',   '^aiFeKytb,E6fob_C|>8,(9-c05u:C T*wTQefY?{65cy5:sL8=3e )Q62t->6_|');
define('NONCE_SALT',       '>g.ADFyY,AZ=+b+08#}@-L+4ogE/WP:Oo/Hg>3J/8`*aB0VtB+UO&yTH7KN4)R1v');

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
