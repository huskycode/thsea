<?php

class m140805_163014_add_sync_time_slide_column extends CDbMigration
{
	public function up()
	{
            $sql = "alter table  video 
                        add column sync_time_slide varchar(5000) NULL after slideshare_url";
            
            $this->execute($sql);
	}

	public function down()
	{
		$sql = "ALTER TABLE video DROP COLUMN sync_time_slide";
            $this->execute($sql);
            
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