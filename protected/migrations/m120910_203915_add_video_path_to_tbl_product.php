<?php

class m120910_203915_add_video_path_to_tbl_product extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tbl_product','video_path','text');
	}

	public function down()
	{
		echo "m120910_203915_add_video_path_to_tbl_product does not support migration down.\n";
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