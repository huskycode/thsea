<?php

class m131126_152326_initial_table extends CDbMigration
{
	public function up()
	{
	   $this->createTable('user',array(
             'id'=>'int(11) NOT NULL AUTO_INCREMENT',
             'user_name'=>'varchar(20) NOT NULL',
             'password'=>'varchar(40) NOT NULL',
             'full_name'=>'varchar(50) DEFAULT NULL',
             'PRIMARY KEY (id)'));
             
	   $this->createTable('video',array(
             'id'=>'int(11) NOT NULL AUTO_INCREMENT COMMENT \'Video ID\'',
             'title'=>'varchar(200) NOT NULL COMMENT \'Video title\'',
             'description'=>'varchar(5000) DEFAULT NULL COMMENT \'Video description\'',
             'url'=>'varchar(500) NOT NULL COMMENT \'Video url\'',
             'thumbnail_url'=>'varchar(1000) NOT NULL COMMENT \'Thumbnail url\'',
             'recording_date'=>'date DEFAULT NULL COMMENT \'Recording date\'',
             'posted_date'=>'datetime NOT NULL COMMENT \'Posted date\'',
             'posted_by'=>'varchar(50) NOT NULL COMMENT \'Posted by\'',
             'PRIMARY KEY (id)'));
        
       $this->createTable('video_tag',array(
             'video_id'=>'int(11) NOT NULL AUTO_INCREMENT COMMENT \'Video ID\'',
             'tag'=>'varchar(50) NOT NULL COMMENT \'Video title\'',
             'PRIMARY KEY (video_id, tag)',
             'CONSTRAINT FK_video_tag FOREIGN KEY (video_id) REFERENCES video(id) ON DELETE CASCADE ON UPDATE CASCADE'));
             
	}

	public function down()
	{
	    $this->dropTable('user');
	    
	    $this->dropTable('video');
	    $this->dropTable('video_tag');
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
