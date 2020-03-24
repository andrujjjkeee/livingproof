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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'livingp1_db');

/** MySQL database username */
define('DB_USER', 'livingp1_new');

/** MySQL database password */
define('DB_PASSWORD', 'x9!,nXTqP9Hu');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME','http://www.livingproofnyc.com/');
define('WP_SITEURL','http://www.livingproofnyc.com/');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'S7;w!9JR{i=:KW2Gya0<22kj)E+nq]{sh0*S8XPiAt9Ain)wE0P`Y6p?&#/VKEcW');
define('SECURE_AUTH_KEY',  'RO]Jmfyx[m.ZVjaS>v-E 3RCNP?M?TC[uM#zHjCQukn%RH_Z;t#cTHA.y/ZrN[uG');
define('LOGGED_IN_KEY',    ',X!OhwtU>(]p=h:Xba*6isS]|!X3X3FUc8CXE13*&Xp,hBhV~;+sCOE5X$9-oJz_');
define('NONCE_KEY',        'Onj9C7^fin6cwU+4pZmP:NTWAyqc=PK=[~f9e~Vq!#0A3PMy2{h3+T@_53 qVVJL');
define('AUTH_SALT',        '_W!]#2[lY~qNk)*f,/O=}G!5uw^b0Xm`=h!!e[VL6<_3Q(0-:u:qlo&?4<Y;$=YB');
define('SECURE_AUTH_SALT', 'Bl[pty>M4(]eua~a~$8tD8`&N$?KZ`Y,2>^+-TiFa;nAFvkG|+0{bA*VRt2<Fg;5');
define('LOGGED_IN_SALT',   '5.|vMuA/cjl]M1|ul9|b=uu~s~]DZ8X*llHT*{uvLlYRM>707sC$g1[!U8Tz_Id4');
define('NONCE_SALT',       'hyBCB_Z[?>0!$o:ZviV?>1(@*gFM[O0F;gy?X@m.4wHbVjdIQE{xq9G}XU(h:t7G');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lwn_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('WPCF7_AUTOP', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
