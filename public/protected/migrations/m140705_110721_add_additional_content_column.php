<?php

class m140705_110721_add_additional_content_column extends CDbMigration
{
	public function up()
	{
            $sql = "alter table video 
                        add column additional_content text NULL COMMENT 'Additional Content in the html format' after slideshare_url";
            
            $this->execute($sql);
	}

	public function down()
	{
            $sql = "ALTER TABLE video DROP COLUMN additional_content";
            $this->execute($sql);
            
            return false;
	}
}