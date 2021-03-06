<?php

use yii\db\Migration;

class m170210_060142_config extends Migration
{
    const TABLE_NAME ='{{%config}}';
    const TABLE_NAME_TAB ='系统配置';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT='."'" . self::TABLE_NAME_TAB ."'";
        }

        $this->createTable(self::TABLE_NAME, [
            'configId' => $this->primaryKey(),
            'configName' => $this->string()->notNull()->comment('配置名称'),
            'configCode' => $this->string()->comment('配置关键字'),
            'configValue' => $this->string()->comment('配置值'),
            'configParentId' => $this->smallInteger()->defaultValue('0')->comment('配置父ID'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}