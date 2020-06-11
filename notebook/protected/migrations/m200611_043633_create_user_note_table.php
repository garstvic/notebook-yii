<?php

class m200611_043633_create_user_note_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('user_note',array(
            'id'=>'pk',
			'user_id'=>'int(11) NOT NULL',
			'note_id'=>'int(11) NOT NULL',
            'created_at'=>'timestamp NULL DEFAULT CURRENT_TIMESTAMP'
        ));			
        
        $this->createIndex('fk_user','user_note','user_id');
        $this->createIndex('fk_note','user_note','note_id');
        
		$this->addForeignKey('fk_user','user_note','user_id','user','id');
		$this->addForeignKey('fk_note','user_note','note_id','note','id');
	}

	public function down()
	{
		$this->dropTable('user_note');
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