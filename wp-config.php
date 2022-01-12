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
define( 'DB_NAME', 'y_marketing' );

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
define( 'AUTH_KEY',         'xmw!#:Ix71]m(tI<CZ=G8Q[2e^R2q@8rh4Dd8Cgi8gV8y-[qqLkKWviY1Gt|LegM' );
define( 'SECURE_AUTH_KEY',  '$8:OpK2zy(ttkM^U2Rbj&iqn@w4[F%Jg,xN#L<ziz8OUN+D[7rYsmJ^[LXh$)b>4' );
define( 'LOGGED_IN_KEY',    'F<zS]=^3IF`` /E**_6:RnTD}ZY~J01BbMykG#x7=`ZMyx,^.}y=*i)1)pT,]IJP' );
define( 'NONCE_KEY',        '>s&%cda?V}2K1[0M*C+-tlP_c:cTqaE;z~KMI C^upr^6QoSX ~s$./+9(2qj`CK' );
define( 'AUTH_SALT',        'NQG4HxpKpk6}~9%c(yVA0Nsh1(56dEBp`/ky(aNwMi<bedybX%bB7@2|dKO3)$/+' );
define( 'SECURE_AUTH_SALT', '-NY*TDJy_E>C4a{Lv?AQp](wS!Z()$sIq}D(+Tum:Y/6H211;.31W,gG-loMh7#]' );
define( 'LOGGED_IN_SALT',   'NAh.nCSSfz7wpxwiyfg6/]yI)Vga~|7jZ$8$])&>|i-Ib *{FFM^<:@?wg0.9tD>' );
define( 'NONCE_SALT',       'SiEB#kI3N_f&.mGy%DSr911h~qTe5_D+.Kr;gYh_Xi?iXK<150+A-^OgUWu_?C?G' );

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
