<?php

class m120901_095801_create_table_category extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_category',array(
			'id' => 'pk auto_increment',
			'name' => 'varchar(200) not null',
			'user_id'=>'integer not null',
			));
	}

	public function down()
	{
		$this->dropTable('tbl_category');
		echo "m120901_095801_create_table_category does not support migration down.\n";
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