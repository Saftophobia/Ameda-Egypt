<?php

class m120905_153235_create_authorization extends CDbMigration
{
	public function up()
	{
		$this->createTable('AuthItem',array(
		'name'=>'varchar(64) not null',
		'type'=>'integer not null',
		'description'=>'text',
		'bizrule'=>'text',
        'data'=>'text',
        'primary key(name)'));

        $this->createTable('AuthItemChild',array(
		'parent'=>'varchar(64) not null',
		'child'=>'varchar(64) not null',
		'primary key(parent,child)'));

        $this->addForeignKey('parent_AuthItemChild','AuthItemChild','parent',
		                                  'AuthItem','name',
		                               'cascade','cascade');

        $this->addForeignKey('child_AuthItemChild','AuthItemChild','child',
		                                  'AuthItem','name',
		                               'cascade','cascade');

		$this->createTable('AuthAssignment',array(
		'itemname'=>'varchar(64) not null',
		'userid'=>'varchar(64) not null',
		'bizrule'=>'text',
        'data'=>'text',
        'primary key(itemname,userid)'));

        $this->addForeignKey('itemname_AuthAssignment','AuthAssignment','itemname',
		                                  'AuthItem','name',
		                               'cascade','cascade');

		                              
	}

	public function down()
	{
		echo "m120905_153235_create_authorization does not support migration down.\n";
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