<?php

class m120901_104156_add_foreign_keys_to_tbl_product extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('user_id_product','tbl_product','user_id',
		                                  'tbl_user','id',
		                               'no action','no action');
	}

	public function down()
	{
		$this->dropForeignKey('user_id_product','tbl_product');
		echo "m120901_104156_add_foreign_keys_to_tbl_product does not support migration down.\n";
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