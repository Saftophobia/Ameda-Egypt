<?php

class m120901_103018_add_foreign_keys_to_tbl_comment extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('user_id_comment','tbl_comment','user_id',
		                                  'tbl_user','id',
		                               'no action','no action');
		$this->addForeignKey('thread_id_comment','tbl_comment','thread_id',
		                                    'tbl_thread','id',
		                                    'cascade','no action');
	}

	public function down()
	{
		$this->dropForeignKey('user_id_comment','tbl_comment');
		$this->dropForeignKey('thread_id_comment','tbl_comment');
		echo "m120901_103018_add_foreign_keys_to_tbl_comment does not support migration down.\n";
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