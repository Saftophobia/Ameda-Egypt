<?php

class m120901_093120_create_table_thread extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_thread', array(
			'id'=>'pk auto_increment',
			'user_id'=>'integer not null',
			'category_id'=>'integer not null',
			'title'=>'varchar(200) not null',
			'created_at'=>'datetime',
			'updated_at'=>'datetime',
			'content'=>'text not null',
			));
		
		
	}

	public function down()
	{
		$this->dropTable('tbl_thread');
		echo "m120901_093120_create_table_thread does not support migration down.\n";
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