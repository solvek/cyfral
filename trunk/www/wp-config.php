<?php
// ** MySQL settings ** //
define('DB_NAME', 'cyfral');    // The name of the database
define('DB_USER', 'root');     // Your MySQL username
define('DB_PASSWORD', ''); // ...and password
define('DB_HOST', 'localhost');    // 99% chance you won't need to change this value
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// Change each KEY to a different unique phrase.  You won't have to remember the phrases later,
// so make them long and complicated.  You can visit http://api.wordpress.org/secret-key/1.1/
// to get keys generated for you, or just make something up.  Each key should have a different phrase.
define('AUTH_KEY', '_jmld,W!]1&J 9kLEDT8Tn.W;`k_ERFN,NTw\\ANCO6Z]ba\'X\'KzD1c<SRIeBV$F~');
define('SECURE_AUTH_KEY', '?H)<p!mdr(\'/-pJR`(H qs!=o(M,M_`^&?tdcO7Ob;Kjl\",1&>&5.~aQw^sd jVy');
define('LOGGED_IN_KEY', 'kGkws88wuDj20op-uc-R;c:2%WPmwjX\"%#bYSF>e{2=p9H{e@M1c+]z(z.6Db[e}');

// You can have multiple installations in one database if you give each a unique prefix
$table_prefix  = 'cf_';   // Only numbers, letters, and underscores please!

// Change this to localize WordPress.  A corresponding MO file for the
// chosen language must be installed to wp-content/languages.
// For example, install de.mo to wp-content/languages and set WPLANG to 'de'
// to enable German language support.
define ('WPLANG', 'ru_RU');

/* That's all, stop editing! Happy blogging. */

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
?>