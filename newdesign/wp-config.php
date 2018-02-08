<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'stmarysh_maryhyd');

/** MySQL database username */
define('DB_USER', 'stmarysh_hyd');

/** MySQL database password */
define('DB_PASSWORD', '6y3c8x1ht3');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'ZN]]b&*JXAo])~D[ww,5#G.9HA(4nts`O--{tG1|C`N|&{k0&*AK;x)oa6d=C-Z;');
define('SECURE_AUTH_KEY',  'zDw5:<T AH2O4L-lA+OS)p+5E,:pI0+Jv5 hv;|dAP33@ndrx^Bl!CUm<3tI|N-&');
define('LOGGED_IN_KEY',    '-!V3sb#ot ;7tj+_h*`ILHoX>{xNMF!t-5&)IjJZr:@DV;Qt(.1S7r[ml%-i]NO?');
define('NONCE_KEY',        '%H`P0PEPm>7e|Xm]v%5p;w]DOZkF`bW?pQW~IELrj8|v{X{RAU?N;j+;XqY*t#av');
define('AUTH_SALT',        'b~FH-XaTa4PJ3k poaE*4f}I9sQCoE%W|1aa>>]<(sWdY!nd$4*%KM-@RdSNy4+q');
define('SECURE_AUTH_SALT', 'Oq DifbCzPgoRoW .e7|Au&6}{0gbm;Rm=awGR&~+}dg0JDgfi+qrN|_cXMUnEZh');
define('LOGGED_IN_SALT',   '+M&q{.##v2~qVNG/~zI+Un5N=Usjamg)Qu<@nz[9pIfdeqsTP0RxY+ UM{0-CK?2');
define('NONCE_SALT',       'KB6,8rO-0d**p!tq5+^K:GGs 3R{u<iIP0-Fm~/[+&$om>a^&WLIclS{w%3d--VC');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
