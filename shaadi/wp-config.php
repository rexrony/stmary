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
define('DB_NAME', 'stmarysh_shaadi');

/** MySQL database username */
define('DB_USER', 'stmarysh_ron');

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
define('AUTH_KEY',         '= `B#l|~wDt9%8gD^FhHpWOJ:-{l5#+{^iv.?l]2$)NJWGA-E%Jwi lN,de,NhLP');
define('SECURE_AUTH_KEY',  'p>`r/ZDf$Ic?a(ldy%:}5?Kk[}r(hjfc10#14KFZHAIjZDp]k3da@*N~#!DOh~<8');
define('LOGGED_IN_KEY',    '^(NqX+5.mmrmp[==2l&.%-4~w>wYr~F>5D5 N<S3Se$;uj!|aNo*7.h@H)y4ed2O');
define('NONCE_KEY',        '7ijT?(v,kWBrmNEL-N#wnoLYTRn 1X(qYU#bAvwVO f=j[5kP<x5|}_cN15pC&$|');
define('AUTH_SALT',        'yPoC`5]u*L%8-(`ww|/xJ,8`uU$qYZ~JR3Bw__>!7:jGPrS%xmb!q(U3m| 0TQaG');
define('SECURE_AUTH_SALT', 'm+q2|A4a6}%ZUJ;UXSC|sw[B+n`E3^Va${R |bB*P(Zt`]`KlAf7m5?5-cS-dg<W');
define('LOGGED_IN_SALT',   '( SmO[(ruHz-L=p1Z+S%$(^q==4X/ 7dJ.d48f_};nsUl{;@c*:UY]|eHE,iZF`}');
define('NONCE_SALT',       'akOT+0IEjcq-j98z}t}YS-qI-C?Mmp5gh$w!bzb7{G%k4xgl!yT8c954X^dYn&aw');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sh_';

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
