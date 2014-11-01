<?php
/**
 * Copyright (c) 2014 Tobia De Koninck <hey--at--ledfan.be>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Chat;

class BackendManager implements IBackendManager {

	/**
	 * @var array $backends
	 */
	private static $backends;

	public static function registerBackend(IBackend $backend){
		if (!isset(self::$backends[$backend->getId()])) {
			self::$backends[$backend->getId()] = $backend;
		}
	}

	public static function unRegisterBackend(IBackend $backend){
		unset(self::$backends[$backend->getId()]);
	}

	public function getEnabledBackends(){
		$enabledBackends = array();
		foreach (self::$backends as $backend) {
			if ($backend->isEnabled()) {
				$enabledBackends[$backend->getId()] = $backend;
			}
		}
		return $enabledBackends;
	}

	public function getBackend($id){
		return self::$backends[$id];
	}

	public function getBackendByProtocol($protocol){
		foreach (self::$backends as $backend) {
			if ($backend->hasProtocol($protocol)) {
				return $backend;
			}
		}
	}

	public function getBackends(){
		return self::$backends;
	}

}