<?php

class m120901_102729_create_tbl_comment extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_comment',array(
		'id' => 'pk auto_increment',
		'user_id'=>'integer not null',
		'thread_id' => 'integer not null',
		'content'=>'text not null',
		));
		
	}

	public function down()
	{
		$this->dropTable('tbl_comment');
		echo "m120901_102729_create_tbl_comment does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}