<?php

class m140322_140809_add_url_name_column extends CDbMigration
{
	public function up()
	{
            $sql = "alter table video 
                        add column url_name varchar(100) NULL after url";
             $this->execute($sql);
	}

	public function down()
	{		
            $sql = "alter table video drop column url_name";
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