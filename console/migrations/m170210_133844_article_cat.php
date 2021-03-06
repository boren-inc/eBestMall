<?php

use yii\db\Migration;

class m170210_133844_article_cat extends Migration
{
    const TABLE_NAME ='{{%article_cat}}';
    const TABLE_NAME_TAB ='文章分类';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT='."'" . self::TABLE_NAME_TAB ."'";
        }

        $this->createTable(self::TABLE_NAME, [
            'articleCatId' => $this->primaryKey(),
            'articleCatName' => $this->string(32)->notNull()->comment('文章分类名称'),
            'articleCatParentId' => $this->smallInteger()->defaultValue(0)->comment('文章分类父ID'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}