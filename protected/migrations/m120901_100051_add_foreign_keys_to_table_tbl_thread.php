<?php

class m120901_100051_add_foreign_keys_to_table_tbl_thread extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('user_id_thread','tbl_thread','user_id',
		                                  'tbl_user','id',
		                               'no action','no action');
		$this->addForeignKey('category_id_thread','tbl_thread','category_id',
		                                    'tbl_category','id',
		                                    'cascade','no action');
	}

	public function down()
	{
		$this->dropForeignKey('user_id','tbl_thread');
		$this->dropForeignKey('category_id','tbl_thread');
		echo "m120901_100051_add_foreign_keys_to_table_tbl_thread does not support migration down.\n";
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