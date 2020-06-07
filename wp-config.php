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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'snapszilla' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')h(gBO6VhWrURUl^n[yb@`wY>ZkXgXrsg]3 Aj@@u4F1#o7u](BIs*rB>[Cg[Ph9' );
define( 'SECURE_AUTH_KEY',  '$e.%I@JS>+Z-r,GFcM2zh5e;E$1FYkS|6EgF;cP#1hR&+P<3H|jHKUtG>x2vvv{q' );
define( 'LOGGED_IN_KEY',    'bMy]rlzy7(xcWRP>]Aom7cc]Aj`Yf}%1$B%vMB18*1^:DVy0gPG`esQ4&ci7#w4&' );
define( 'NONCE_KEY',        'H.T1Ce~@qh-wf6[ECRS7S%5jdFg1yM.!RF8ZUXF<p+|>q9e_`U?5X4L59dhz~NYu' );
define( 'AUTH_SALT',        'Fn]cd+||_`!cYkz#U>c$Rl;%YfslZp?~@jC/Cc a;+3?i!JTJB&i5OgRBq/_e3H|' );
define( 'SECURE_AUTH_SALT', 'qN1Otiixe!Y]wgY9ln?paHq7c.+l)$bGM2B;Ik4V^(N+t~)e83%y#BeU{U`b@rtl' );
define( 'LOGGED_IN_SALT',   'u>+MV,]=+9zv19J`JCiuiP;y.x+kod+_:GMY@E]];e;:Q5mD.Zk2w@}#F`EEE^~T' );
define( 'NONCE_SALT',       'gYJ~UZb2{H#YasSk9IngRBeVAq-b_gKUMLo;vUS`9TEnR2s-K<9[7&)5q%ydUw]h' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
