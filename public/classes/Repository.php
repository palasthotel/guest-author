<?php

namespace Palasthotel\WordPress\GuestUser;

class Repository {

	public function setIsGuest( $userId, bool $isGuest ) {
		if ( $isGuest ) {
			update_user_meta( $userId, Plugin::USER_META_IS_GUEST, Plugin::USER_META_IS_GUEST_VALUE );
		} else {
			delete_user_meta( $userId, Plugin::USER_META_IS_GUEST );
		}
	}

	public function isGuest( $userId ): bool {
		return get_user_meta( $userId, Plugin::USER_META_IS_GUEST, true ) === Plugin::USER_META_IS_GUEST_VALUE;
	}
}