<?php

class m200611_043441_create_note_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('note',array(
            'id'=>'pk',
            'phone'=>'varchar(50) NOT NULL',
            'name'=>'varchar(256) NOT NULL',
            'email'=>'varchar(256) NOT NULL',
            'created_at'=>'timestamp NULL DEFAULT CURRENT_TIMESTAMP'
        ));		
	}

	public function down()
	{
		$this->dropTable('note');
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