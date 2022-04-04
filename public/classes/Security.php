<?php

namespace Palasthotel\WordPress\GuestUser;

use WP_Error;
use WP_User;

class Security extends Components\Component {

	public function onCreate() {
		parent::onCreate();
		add_filter( "authenticate", [ $this, 'authenticate' ], 100 );
	}

	/**
	 * @param WP_User|WP_Error|null $user
	 *
	 * @return WP_User|WP_Error
	 */
	public function authenticate( $user ) {

		if ( $user instanceof WP_User ) {

			$isGuest = $this->plugin->repository->isGuest( $user->ID );

			if ( $isGuest ) {
				return new \WP_Error( 'guest', "Guest accounts cannot sign in." );
			}
		}

		return $user;
	}
}