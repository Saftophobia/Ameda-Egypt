<?php

class m120926_070925_add_foreign_key_to_stores extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('user_id_stores','tbl_stores','user_id',
		                                  'tbl_user','id',
		                               'no action','no action');
	}

	public function down()
	{
		$this->dropForeignKey('user_id_stores','tbl_stores');
		echo "m120926_070925_add_foreign_key_to_stores does not support migration down.\n";
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