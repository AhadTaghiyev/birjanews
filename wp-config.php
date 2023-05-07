<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u351169299_rjGoX' );

/** Database username */
define( 'DB_USER', 'u351169299_dRq1o' );

/** Database password */
define( 'DB_PASSWORD', 'Q2jiMJtoHH' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '3N>|g&~/VSA[9)PQE332ddy[]=;^f5`i7g$ulk#Y~lOtwPh#T{m*vJv$.NN)9w-{' );
define( 'SECURE_AUTH_KEY',   '0cGhU,+g!J7z#.3W[FF{H%Y>@{?Go8B%8n-^}AtlVE^V7l},).jtSqx)!olw;GJr' );
define( 'LOGGED_IN_KEY',     'Tg3>F+rNz]<IWRyTwJi*dKi(vf@&S,2RUpWb]79uc7^EgB.V!-vf5xvtNN[S_`y}' );
define( 'NONCE_KEY',         '|8u}7slxP#gA3Q0&2AWsTR;(PX9!f8s%wx)+x(I=EV!,Q9 A3FT&OOg~;8fUz:~$' );
define( 'AUTH_SALT',         ')* J2DJ}7.L`@@7OIX0;hZhOMk=Z3OT(Y8@d3+wQ!E4HkC!~$o|[[YqRen$j}R(8' );
define( 'SECURE_AUTH_SALT',  'jed^:)*.nW$7_bEsfoYCjp:L`(pnAP$<g?jYrfQLmHGA/74L{R.`^`~+qx|T:r L' );
define( 'LOGGED_IN_SALT',    '{<vwbL+%=CKysa|qz4E@PAH5S {QD;<r.J[(TQiA1j:J3B2c;vX<&^*]N#@8JB&5' );
define( 'NONCE_SALT',        'agO7F9<w.grF,F+Q:#g4})BfxWv>0vVS$vP+Ka3_xTUI8|^BZm0WSfSZE?U~avs&' );
define( 'WP_CACHE_KEY_SALT', '^ <4s]U2A:L:+iMN{hgVmo>^QT PFu2i!lJ,pjGqyV/RGZv.r+fZ=JBp6$*)gmj0' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
