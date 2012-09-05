<?php

class m120901_090838_create_table_user extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_user',array(
			'id' => 'pk AUTO_INCREMENT',
			'info' => 'text',
			'first_name'=>'varchar(50) not null',
			'last_name'=>'varchar(50) not null',
			'email'=>'varchar(200) not null',
			'confirmed_email'=>'boolean',
			'username'=>'varchar(100) not null ',
			'password'=>'varchar(100) not null ',
			'dob'=>'datetime',
			'date_joined'=>'datetime',
			'picture_path'=>'text',

			));
	}

	public function down()
	{
		$this->dropTable('tbl_user');
		echo "m120901_090838_create_table_user does not support migration down.\n";
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