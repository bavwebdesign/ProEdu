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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'XuZO@(q3J 6<[#cO|:@5atdi*ZJQe>nB0[[74[}T!qDTJEZ61#REx{^d*4$|u&~d' );
define( 'SECURE_AUTH_KEY',   'D1vi-}L20(f1&K9mW[!6:q>P=3>]mbXE }l** ;]lQ|V5J{:{&;l8mwX{QR9iqdx' );
define( 'LOGGED_IN_KEY',     'ktS!Cbh#7lK2t@sl2VTxBiKj2z&%`q| -K)_d2Occm-v?^IBN/PKFamxoe9M<69=' );
define( 'NONCE_KEY',         ';F&za.Ws1}w&L{!O>!PiZl}|,:LB`(A&eCNLRI9uU0`l&y6oJmFB8c|^b-ffRI#c' );
define( 'AUTH_SALT',         'j*~%{XVTUp{y$R@>PfI5mx5WdpIE,&Xd@$0_gloo~o2zUfQ.2$0@>HH;_Z[P7@wt' );
define( 'SECURE_AUTH_SALT',  'lk1CG>k1+lZ/$5;,Ui*bC+%k~`C(%K,Fd=X&BEH=6w#_[oMGEb _h%p6igWvOq&f' );
define( 'LOGGED_IN_SALT',    'GFQ_/YW,lrP(g|u,Pq!1?OpbS&L|[ * XpA~(^*f[c}F?6QbY**B2tta#Z@%Xk Q' );
define( 'NONCE_SALT',        'R~ED:k<leA-dG_ %]tR#~nye5L4D]VnQmV1V=iaLI4o0^4j.[}3)|YPl(8aX EMo' );
define( 'WP_CACHE_KEY_SALT', 'E<dI/VE&_npEQ/DC>+}aA$`D.^,}EqVG)GV&d<=HS|~10fPpRYGh^@)#D%!PoG)r' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
