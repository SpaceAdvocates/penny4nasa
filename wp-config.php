<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

# read the credentials file
$string = file_get_contents($_ENV['CRED_FILE'], false);
if ($string == false) {
	// die('FATAL: Could not read credentials file');
}

# the file contains a JSON string, decode it and return an associative array
$creds = json_decode($string, true);

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', $creds['MYSQLS']['MYSQLS_DATABASE']);
}
if (!defined('DB_USER')) {
	define('DB_USER', $creds['MYSQLS']['MYSQLS_USERNAME']);
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', $creds['MYSQLS']['MYSQLS_PASSWORD']);
}
if (!defined('DB_HOST')) {
	define('DB_HOST', $creds['MYSQLS']['MYSQLS_HOSTNAME']);
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '.wco.H`{|VV$!T`*cvQ)p2SR4y`Jm1t8n]<UvWfw6v<u6+OMBWj0rqUa9n:);W}+');
define('SECURE_AUTH_KEY',  '(i4](RG$u-p|SZj_Q}gAg8w&;_):10|GOh^!(ci6)X4 _vhm|HQh^hFb+`D7;*{_');
define('LOGGED_IN_KEY',    '[qfY+r+U$d.fP]0?k>I[bj6$/G#:,hLPo?,0a]+f47a@?[3RS|I/o9Fe @y+L`+*');
define('NONCE_KEY',        'f1+*mA^ws|tb46xuCRB+BW;taeH.dnhF+KHw[ISJ0=pB[hf)|1PsLV#*e}UrfTl|');
define('AUTH_SALT',        '0.7JSom?d+2nn~^/ft,N<A|?26)H/-b|^R|1!U-B^~FS+6W>p<3q(7%7jk7sM;O|');
define('SECURE_AUTH_SALT', 'an$}v;V9(ZVGX|-L*W2^/uT`eTnz4j1&eP_T+C%cMHX(gX,sGG.nd5;$kOmG!|EG');
define('LOGGED_IN_SALT',   '4rISNu7&0QmHVxoI=/`[==8%68SB*<V%hqVa`K?)sxf81M-pP>>w6r-MvdX#D[N[');
define('NONCE_SALT',       '-|G~Y!|L_Wsk&hd),^n`gKNw>j(t<Y#MC16*YJP< <|3t8~z-t~r5?^8|LPSz_FO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . '');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
