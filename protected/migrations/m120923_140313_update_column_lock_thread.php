<?php

class m120923_140313_update_column_lock_thread extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('tbl_thread','locked','bool default false not null');
	}

	public function down()
	{
		echo "m120923_140313_update_column_lock_thread does not support migration down.\n";
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