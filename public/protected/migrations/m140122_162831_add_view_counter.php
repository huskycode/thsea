<?php

class m140122_162831_add_view_counter extends CDbMigration {

    public function up() {
        $sql = "ALTER TABLE video"
                . " ADD view_counter BIGINT NOT NULL DEFAULT 0";
        $this->execute($sql);
    }

    public function down() {
        $sql = "ALTER TABLE video"
                . " DROP COLUMN view_counter";
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
