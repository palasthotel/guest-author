<?php

namespace Palasthotel\WordPress\GuestUser;

class AdminView extends Components\Component {

	public function onCreate() {
		parent::onCreate();

		add_action('user_new_form', [$this, 'user_new_form']);
        add_action('user_register', [$this, 'user_register']);

		add_action( 'edit_user_profile', [ $this, 'edit_user_profile' ] );
		add_action( 'edit_user_profile_update', [ $this, 'edit_user_profile_update' ] );
	}

	public function user_new_form($type){
        if($type === "add-new-user"){
	        $this->render(false);
        }

	}

	public function edit_user_profile( \WP_User $user ) {
		$isGuest = $this->plugin->repository->isGuest( $user->ID );
		$this->render($isGuest);
	}

	private function render( $checked ) {

		?>
            <h2>Guest User</h2>
            <table class="form-table">
                <tbody>
                <tr>
                    <th>
                        <label for="guest-user"><?php _e("Guest", Plugin::DOMAIN); ?></label>
                    </th>
                    <td>
                        <label for="guest-user">
                            <input type="hidden" name="is_guest_user_request" value="it-is" />
                            <input type="checkbox" name="is_guest_user" id="guest-user" value="true" <?= $checked ? "checked" : "" ?> /> <?php _e("If checked, user cannot sign in.", Plugin::DOMAIN); ?>
                        </label>
                    </td>
                </tr>
                </tbody>
            </table>
		<?php
	}

    public function user_register($user_id){
	    $this->trySafe($user_id);
    }

	public function edit_user_profile_update($user_id){
		$this->trySafe($user_id);
	}

    private function trySafe($user_id){
	    if ( !current_user_can( 'edit_user', $user_id ) ) {
		    return false;
	    }

	    if(!empty($_POST["is_guest_user_request"]) && "it-is" == $_POST["is_guest_user_request"] ){
		    $this->plugin->repository->setIsGuest(
			    $user_id,
			    !empty($_POST["is_guest_user"]) && $_POST["is_guest_user"] == "true"
		    );
	    }
    }
}