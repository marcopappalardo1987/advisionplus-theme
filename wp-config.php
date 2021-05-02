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
define( 'DB_NAME', 'themeplus' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define( 'AUTH_KEY',         'q BP}oPL;kn;-LC#sOE^,{KAv *w _wA$)GxkU&6CSmgS|;W,.5H`BHe~Gn^24`m' );
define( 'SECURE_AUTH_KEY',  '1gR8hjBm2.{3?[n*MS&H>Q,rLz#Uy[*Rgispco[G=yC@~navzo4 <tBCeGJPH{Y;' );
define( 'LOGGED_IN_KEY',    ':;,-_Njnp{i?X%!p RkA/k(n^#;WuY1K?=hML6:TSNgwUPW/!?y=/kUfJ07GSg;w' );
define( 'NONCE_KEY',        ' rUY/]E @Rf>QfLr-3?}l&#=^9GVeM9AAd)=~bB(`jA=yt=BJU;QrS*K^;}#I@BS' );
define( 'AUTH_SALT',        'gkMdAV(d4?[?y>EbB?PP0[m.L#A7A%SW1h2`z)xB@m)VVk-~%@?79cKa4q8;imFD' );
define( 'SECURE_AUTH_SALT', 'pwUai:p}MVFs*4lOneKAJVYh)@F4!0G71z_p*9jjkU#9S`I.K*s;x1|[^o1xE^$O' );
define( 'LOGGED_IN_SALT',   '/+jij r/5T!P~ltP~>f0~X.rhx@wzBh.EL2F/Kw0%V!;:??A~FlWsbHv46[1Ue@m' );
define( 'NONCE_SALT',       'X1S&%Sx16FJ~(cC{(3H:<8n!Ov92m_f2vN4+JA8niNP0QT1m*m)<9A~U|r`A/08[' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
