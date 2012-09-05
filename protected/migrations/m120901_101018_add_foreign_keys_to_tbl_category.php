<?php

class m120901_101018_add_foreign_keys_to_tbl_category extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('user_id_category','tbl_category','user_id',
		                                  'tbl_user','id',
		                               'no action','no action');
		 
	}

	public function down()
	{
		$this->dropForeginKey('user_id','tbl_category');
		echo "m120901_101018_add_foreign_keys_to_tbl_category does not support migration down.\n";
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