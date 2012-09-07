<?php

class m120906_135703_add_lock_to_thread extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tbl_thread','locked','bit not null');
	}

	public function down()
	{
		//fakes
		echo "m120906_135703_add_lock_to_thread does not support migration down.\n";
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
