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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tourismemali' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '7_B(x^fuZkxy)M<.u/(pfzN,k?$@Sz$/<#=+SB{zCF9PZ):flYdHdG(XhNgWGuQe' );
define( 'SECURE_AUTH_KEY',  'd_9|>kL9>9X1G}J+|O@m]zOf1eXRY#(>>o>~;;5-B@ 7M6G4eH!wBae;<uqKYA66' );
define( 'LOGGED_IN_KEY',    'MVC*J0wInW(nJJ*nPzA2en9M5#nNCj]myRDAiy~?q-qdA/z$ZR}v}R0c!sSHuO|`' );
define( 'NONCE_KEY',        'c(mJRy^gkmlvwW|:^S{3a@=`}c.:Kve#`L_Q_?!lR..Bss)&Una,x7v@(%2P*G6%' );
define( 'AUTH_SALT',        'B2-};v]z>.{M1Vw,.A15/[>swN%V_c)]-pFa5rjJPJg56%RW$d6Ld[[Y0,,ZaR32' );
define( 'SECURE_AUTH_SALT', 'i)z|4-Jb3:`Vy Y;jg4G=~B8VfMm+D9*QUq!/I-mMSjEBz.O-RK0HnEdSac^d|PX' );
define( 'LOGGED_IN_SALT',   'K#|`OM8Ryxo7>u6Cqz]xT[P7F*uXK;95XT[Zv8,R+e47n0)?Bij(d>rdn^ZF?`9x' );
define( 'NONCE_SALT',       '9FPT1iAE)N.;okI(p@bI)S&CF@Id@z_O~jQW-9TD[$tZx ?z#ZAVqi$&O8o9~f%B' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
