<?php

class m120921_112712_add_info_to_product extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tbl_product','info','text');
	}

	public function down()
	{
		echo "m120921_112712_add_info_to_product does not support migration down.\n";
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