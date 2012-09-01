<?php

class m120901_103723_create_tbl_products extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_product',array(
			'id'=>'pk auto_increment',
			'user_id' => 'integer not null',
			'name'=>'varchar(200) not null',
			'picture_path'=>'text',
			'price'=>'integer(32) not null',
			'available'=>'boolean default false',
			));
	}

	public function down()
	{
		$this->dropTable('tbl_product');
		echo "m120901_103723_create_tbl_products does not support migration down.\n";
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