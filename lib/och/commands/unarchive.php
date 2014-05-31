<?php

namespace OCA\Chat\OCH\Commands;

use \OCA\Chat\OCH\ChatAPI;
use \OCA\Chat\Core\API;
use \OCA\Chat\OCH\Db\UserOnlineMapper;
use \OCA\Chat\OCH\Commands\SyncOnline;

class UnArchive extends ChatAPI {


	public function setRequestData(array $requestData){
		$this->requestData = $requestData;
	}

	public function execute(){
		$userMapper = $this->app['UserMapper'];
		$userMapper->setArchived($this->requestData['conv_id'], false, \OCP\User::getUser());
	}
}
