<?php

class m120910_204410_add_created_at_to_tbl_comment extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tbl_comment','created_at','datetime');
	}

	public function down()
	{
		echo "m120910_204410_add_created_at_to_tbl_comment does not support migration down.\n";
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