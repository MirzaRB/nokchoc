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
define( 'DB_NAME', 'u356042611_nokchoc' );

/** Database username */
define( 'DB_USER', 'u356042611_nokchoc' );

/** Database password */
define( 'DB_PASSWORD', '8wT:5S7=44!' );

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
define( 'AUTH_KEY',         '}*@Q<D*EcI,)4.x/]KMRw}<;pc:Px.<q?1tzveeVt?.4 Dt4(Co`lNNbN ?9g1WS' );
define( 'SECURE_AUTH_KEY',  '7k/SNN5[ij5vQMAV4p#(g43eg:`rzL[k]Cj/523]=,B!DnfsrivHF/+z.gbL#K[!' );
define( 'LOGGED_IN_KEY',    '%_-I,?`nr`K89|XLaMn%JaV*DHCQochI?Y)Cs^c2TpSGl>Dg5=^<16n+D;E4JT*N' );
define( 'NONCE_KEY',        '~#V:A]1rY@:8/=qJU74nT=oIP,V(Us%h5GbI+zd:>xKF1X^JCk|HjID0;3,/<P?l' );
define( 'AUTH_SALT',        '2(hu]nPAX0PK!Bj!Egm3a^?`yNk,vj`8A UMR2b$zW?|e^+-t>yPMzZ?dd]vUxS ' );
define( 'SECURE_AUTH_SALT', 'Nl(V6w_Yq$<*c-4/Cw,;/ ZFg[CL4ga&![b7wt]njgZjADx!,~X)$Di,.R@Iu1dQ' );
define( 'LOGGED_IN_SALT',   '%ALn_2Tx7,6`36b-]``PToK+RN=R&}txJah#,!vo&h*i=$l5>?E/.<17v;OCkz4b' );
define( 'NONCE_SALT',       '}&]@QU /,PR{IE4h_CxB_h?Vf39uI@+Jax:/6NNb:2RZ}a0V4,?_]1Ax7nYZiPOg' );

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
// check errors
define( 'WP_DEBUG_LOG', 'wp-errors.log' );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
