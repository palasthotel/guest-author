<?php

/**
 *
 * Plugin Name: Guest User
 * Plugin URI: https://github.com/palasthotel/guest-user
 * Description: Label accounts as guests and prevent the login
 * Version: 1.0.0
 * Author: Palasthotel by Edward <edward.bock@palasthotel.de>
 * Author URI: https://palasthotel.de
 * Requires PHP: 7.4
 * Text Domain: guest-user
 * @copyright Copyright (c) 2022, Palasthotel
 * @package Palasthotel\WordPress\GuestUser
 *
 */

namespace Palasthotel\WordPress\GuestUser;

require_once dirname(__FILE__)."/vendor/autoload.php";

/**
 * @property Repository $repository
 * @property Security $security
 * @property AdminView $adminView
 */
class Plugin extends Components\Plugin {

	const DOMAIN = "guest-user";

	const USER_META_IS_GUEST = "_is_guest_user";
	const USER_META_IS_GUEST_VALUE = "yes";

	function onCreate() {

		$this->loadTextdomain(Plugin::DOMAIN, "languages");

		$this->repository = new Repository();
		$this->security   = new Security($this);
		$this->adminView  = new AdminView($this);

	}
}

Plugin::instance();

require_once dirname(__FILE__)."/public-functions.php";