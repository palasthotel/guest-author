<?php


/**
 * Plugin Name:       Guest User - DEV
 * Description:       Dev inc file
 * Version:           X.X.X
 * Requires at least: X.X
 * Tested up to:      X.X.X
 * Author:            PALASTHOTEL by Edward
 * Author URI:        http://www.palasthotel.de
 * Domain Path:       /plugin/languages
 */

use Palasthotel\WordPress\BlockX\Plugin;

include dirname( __FILE__ ) . "/public/guest-user.php";

register_activation_hook(__FILE__, function($multisite){
	Plugin::instance()->onActivation($multisite);
});

register_deactivation_hook(__FILE__, function($multisite){
	Plugin::instance()->onDeactivation($multisite);
});