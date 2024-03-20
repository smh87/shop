<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'yZFpu+>w-F_R/=Ccw1rWKovY=:+a{uCFd.>H-2T~kZ-Y_sRwJD|m/yLL95XQVsf`' );
define( 'SECURE_AUTH_KEY',  'a@sNFsjyhbLCS~w/97]%>!Aj0=7#UY*i/[];qEL1-t~ar).?cG,|A+Gv}SnP,) N' );
define( 'LOGGED_IN_KEY',    '^ga{3jBO`VkcUTmZ^xg!pr<2?VRN@gcRi;R5&fCB2-D?Y|ILKuC q@5EHd2K:DX!' );
define( 'NONCE_KEY',        'e]^6r~+$%_l^E{<J,8!Z%Zn5v:,W3}p_I7Y{=m;[pm[27<F:Nf7G(JgC_^Lx>~yl' );
define( 'AUTH_SALT',        'Z/X|H|3)iwkouGC:)nCmd?24Hr~e-QQ%UfQC%)u743e/Bc~Rc/2gA#uo/|6Aa9+m' );
define( 'SECURE_AUTH_SALT', 'w)6frI+xE#M8d&:P=$;E52-P(vFQp/^;i&yc|B]?>DPv@Mp*CkQ+,c{u#jY:qDBi' );
define( 'LOGGED_IN_SALT',   'n;be_VM&Ax,Nx{xk}H5DZyg<jH1hww5P{{T1ceQ-6Vg-EhE0g5z(W+1VV&Eva1Z[' );
define( 'NONCE_SALT',       '5X#.*^carR!mr6!xG_v.A&:eux|1>bClOf{n0g;u.r0A3EMtVtt;M(,c%&25?.<C' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
@ini_set('upload_max_size' , '256M' );
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
