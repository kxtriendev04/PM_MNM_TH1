<?php
define('WP_ALLOW_MULTISITE', true);
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'localhost:8080' );
define( 'PATH_CURRENT_SITE', '/DienLuc/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
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
define( 'DB_NAME', 'dienluc' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '.Lk;*!PvY|^2?ph+]p`P!FzJtQ=19*S.I>a,@d9e8=Th.$w72[}rywW=a8>_2#cw' );
define( 'SECURE_AUTH_KEY',  'Xs8~T?B6]PGL?N~$@Yx(;M!Yn bf1]Hka_*Zds$10JMlUP.+B+;wVHwU11k|ac~>' );
define( 'LOGGED_IN_KEY',    'q5*K&.Lekvl+w>_bZ7wsP&8{Qh.+F97ecI1rThZ8l1 )qg@;C[AV]]`u_0/,n1p}' );
define( 'NONCE_KEY',        'LJJ.]>{:1whwE=51v^m,8=U_~Wt_9$`k*W~Bn1@7Ef=e7,4Hc&Th=wBhF<!so/AY' );
define( 'AUTH_SALT',        'U9Qd&hMX366!|FnDp8cX>Ol]!~5Gg@r=Yk/R;PwSmIJvV4V^z<:O@C7U_hw,/m9m' );
define( 'SECURE_AUTH_SALT', '+r&I]NAU/@yk8A);[#-6}h&);[Bu9z51bdIj U.@FC?PJ&>tL4?>^!4.kV`o,gby' );
define( 'LOGGED_IN_SALT', 'vdW>B4/M_5o9pxSzWS3sM9 A9i&40oIw#H1~{6*Y!h=U*zF4BI[}oMk3~ C^E<2,' ); define( 'NONCE_SALT'
    , ' +/DB;F+jIw+f8&`MW>&Blh3ESlsAy^veh7o V@~=*_5=zrwmQoBPfh&V=Ym0iJr' ); /**#@-*/ /** * WordPress database table
    prefix. * * You can have multiple installations in one database if you give each * a unique prefix. Only numbers,
    letters, and underscores please! * * At the installation time, database tables are created with the specified
    prefix. * Changing this value after WordPress is installed will make your site think * it has not been installed. *
    * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix */
    $table_prefix='wp_' ; /** * For developers: WordPress debugging mode. * * Change this to true to enable the display
    of notices during development. * It is strongly recommended that plugin and theme developers use WP_DEBUG * in their
    development environments. * * For information on other constants that can be used for debugging, * visit the
    documentation. * * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/ */
    define( 'WP_DEBUG' , false ); /* Add any custom values between this line and the "stop editing" line. */ /* That's
    all, stop editing! Happy publishing. */ /** Absolute path to the WordPress directory. */ if ( ! defined( 'ABSPATH' )
    ) { define( 'ABSPATH' , __DIR__ . '/' ); } /** Sets up WordPress vars and included files. */ require_once ABSPATH
    . 'wp-settings.php' ;