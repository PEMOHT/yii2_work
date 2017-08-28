<?php

use yii\db\Migration;

class m170823_181819_work extends Migration
{
    public function safeUp()

    {   $this->execute("
        CREATE TABLE IF NOT EXISTS `work` (
            `id` int NOT NULL AUTO_INCREMENT, 
            `title` varchar(128) NOT NULL,
            `author` varchar(32) NOT NULL,
            `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `article` text NOT NULL,
            `image` varchar(128) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `title`(`title` ASC)) 
        ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
    }

    public function safeDown()
    {
        $this->execute("
        DROP TABLE IF EXISTS `work`;
      ");
    }


}

