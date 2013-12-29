<?php
namespace OCA\Chat\Db;

use \OCA\AppFramework\Db\Mapper;
use \OCA\AppFramework\Core\Api;


class ConversationMapper extends Mapper {


    public function __construct(API $api) {
      parent::__construct($api, 'chat_conversations'); // tablename is news_feeds
      $this->tableName = '*PREFIX*' . 'chat_conversations';
    }

	public function deleteConversation($conversationID){
		$sql = 'DELETE FROM `' . $this->getTableName() . '` WHERE `conversation_id` = ? ';
        $this->execute($sql, array($conversationID));
	}
	
	public function findByConversationId($conversationID){
     	$sql = 'SELECT * FROM `' . $this->getTableName() . '` ' . 'WHERE `conversation_id` = ?';
  		return $this->findEntity($sql, array($conversationID));
	}
	
}