<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_finura_db');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', '127.0.0.1');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');



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
define('AUTH_KEY',         'O .&_+}mlh%n5Xw /HmmCLI^eYy[k) Cj.Yf :rr~];n8Q/)`QOT[X.7RXCYIaOU');
define('SECURE_AUTH_KEY',  'q7 @&Dj9O.8InMp+q|kWef_1$#MYf0SkaA-+g2xNHVbcSeE`C&}Aa7~)mft!U?bO');
define('LOGGED_IN_KEY',    'z$M9Flr2QD%4i<k&@9h+K=dEu3@9CPQ3WodJZT9A,7]{%#c?|FVE{IumN]^n]:yp');
define('NONCE_KEY',        'c|8q^bh9~YBZF!VJ;n8 lIg_J3pxw;Ai}x;q#8INh|=f[RQY)lVOh~?Q`GP`{LV$');
define('AUTH_SALT',        '$,csUj9LLkxDv$u8PUDwaYS>$`n/dKUW`Q/|HBvrTPUj,8qh{wp!7)b+2H@P5TA ');
define('SECURE_AUTH_SALT', '<`j`1p2vk}H%&M(&/AE*Tdi(BH/V+9NX4ZT`Vcj}YCc^%!RU7H]7UX]uHA/xx^s6');
define('LOGGED_IN_SALT',   'Ep;4oDFi^E~@WLP)6?5Z{VQyPIkcJ~1XWU6VT*S=zP=-lY`-g.C%dz>&mnY#mIx@');
define('NONCE_SALT',       '_9:OLc`,vD>t]Tv5-d f?YVEDxV}9ucJbQEU&buS+g6.4G(<b#9}UJuJE!casIQF');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
