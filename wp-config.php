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
define('DB_NAME', 'vienthammyyurihanh');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2BN.FA`>fE!ij5$_FR(DdpPL+?rd](PV*(S;c1LtMZO8Jxg*9s.t;vV]>K]<f.|N');
define('SECURE_AUTH_KEY',  '`7^-/Sg*gtSa( mkZ;sQNwHVq:bbf g{28D4Jq#bxGBX&LuDY1b^{5oGGpvlYR&K');
define('LOGGED_IN_KEY',    '#2*q8D1gD.OJ<e3B+.6}J_=`1AZ5UcbP+*=z3u$V#rbCp)%Pt=ZzJ;){70y5Jn-C');
define('NONCE_KEY',        'M,+^.M:=RU|7RhS%[5J[xUxz}/& F9<~{C.z2$/qkV>a@|F+PjSEv3(:q!wl>6d$');
define('AUTH_SALT',        'v^K[#cFx*&<{ENzTJ!0[2Z5=LayF?9Nys`T3/T_FHL]2aPZaYm}}#:kH6*+U;)^j');
define('SECURE_AUTH_SALT', ' 4S^seEVO`g>2.6Zotb nWfa.2~CE+Rv9jrd:SVj!6K-x+n t9O@=3,tT}!!zz1z');
define('LOGGED_IN_SALT',   'y:==m4G0(!sVIZ4bSY@&DtI{0Gg7OZ=tVmd<k+[V*3+3fK2r~!>&^/CK~z=4+GA!');
define('NONCE_SALT',       '@p <M{-E=Si,sk]!!m]6PS(Gg&-%1H)_~6Tf_:T;YI)f@H)nDBXeQ08u$5p<),l[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
