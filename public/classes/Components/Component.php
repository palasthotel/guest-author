<?php

namespace Palasthotel\WordPress\GuestUser\Components;

/**
 * Class Component
 *
 * @property \Palasthotel\WordPress\GuestUser\Plugin plugin
 *
 * @package Palasthotel\WordPress
 * @version 0.1.2
 */
abstract class Component {
	/**
	 * _Component constructor.
	 *
	 * @param \Palasthotel\WordPress\GuestUser\Plugin $plugin
	 */
	public function __construct(\Palasthotel\WordPress\GuestUser\Plugin $plugin) {
		$this->plugin = $plugin;
		$this->onCreate();
	}

	/**
	 * overwrite this method in component implementations
	 */
	public function onCreate(){
		// init your hooks and stuff
	}
}