<?php

class m120923_141021_add_locked_to_tbl_user extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tbl_user','locked','bool default false not null');
	}

	public function down()
	{
		echo "m120923_141021_add_locked_to_tbl_user does not support migration down.\n";
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