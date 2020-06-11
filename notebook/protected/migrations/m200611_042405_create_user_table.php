<?php

class m200611_042405_create_user_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('user',array(
            'id'=>'pk',
            'email'=>'varchar(256) NOT NULL',
            'password'=>'varchar(256) DEFAULT NULL',
            'status'=>'int(3) DEFAULT NULL',
            'last_login_time'=>'datetime DEFAULT NULL',
            'created_at'=>'timestamp NULL DEFAULT CURRENT_TIMESTAMP'
        ));
	}

	public function down()
	{
		$this->dropTable('user');
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