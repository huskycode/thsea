<?php

class m140521_161554_add_slideshare_url_column extends CDbMigration
{
	public function up()
	{
            $sql = 'ALTER TABLE  video
                        ADD COLUMN slideshare_url VARCHAR(1000) NULL ';
            $this->execute($sql);
	}

	public function down()
	{
            $sql = "ALTER TABLE video DROP COLUMN slideshare_url";
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