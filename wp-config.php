<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings
define( 'WPCACHEHOME', '/var/www/bucketlistplan.co.id/web/wp-content/plugins/wp-super-cache/' );
define( 'WP_CACHE', true );
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
define( 'DB_NAME', "blp_wp" );
/** MySQL database username */
define( 'DB_USER', "root" );
/** MySQL database password */
define( 'DB_PASSWORD', "hanwhas3cur3" );
/** MySQL hostname */
define( 'DB_HOST', "localhost" );
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
define( 'AUTH_KEY',         'edwzw1zld9kzmoqx6sfdr3gcpnx9topio19kiohpkjb5ucdbdms0mncanzopqvyu' );
define( 'SECURE_AUTH_KEY',  'kn0ggflwwglx8u1ujuyb4cntfxkamlu6vbcooqhtjikjdy35ojm6cpirzv2ad7do' );
define( 'LOGGED_IN_KEY',    'hifwr6nchetlpirgthumoxq7harp8hs1mnqhup9abxbtmyw4uwekkexwcacdujuj' );
define( 'NONCE_KEY',        'tbwlkbytlzjxduc1ueypvpfvmffzh5cfj1m5z4doyaarblhcpsxllwlogjnt65bc' );
define( 'AUTH_SALT',        '6ifq1ieful3snszhcv1exfyubvgans6h0t6fzeq35nz0duedemvuvrihhfomqbv5' );
define( 'SECURE_AUTH_SALT', 'iiwux9zjzoaqmmzd1d1c4bjwfufs95numzcscrrwjftspgfltzb8s7aeyfjye2w0' );
define( 'LOGGED_IN_SALT',   '7fpj6ydroqvrnv47tzowwummadksp33znxkz8optj0xu1ekhtuzuwla2m1qxygs5' );
define( 'NONCE_SALT',       'z2uab1b9cqq2lfvbn9ciuegaob1hxphsssuyxno7zkscnu57enl7cwuyxppbxnkt' );
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpvk_';
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