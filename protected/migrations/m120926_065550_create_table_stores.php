<?php

class m120926_065550_create_table_stores extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_stores',array(
			'id'=>'pk auto_increment',
			'user_id' => 'integer not null',
			'name'=>'varchar(200) not null',
			'phonenumber'=>'text',
			'fax'=>'text',
			'address'=>'text',
			'email'=>'varchar(200)',
			'created_at'=>'datetime',
			'updated_at'=>'datetime',
			));
	}

	

	public function down()
	{
		$this->dropTable('tbl_stores');
		echo "m120926_065550_create_table_stores does not support migration down.\n";
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