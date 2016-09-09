<?php

use yii\db\Migration;

class m160825_206450_news extends Migration
{
    const TABLE = 'news';

    public function up()
    {
        $this->createTable(self::TABLE, [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'theme_id' => $this->integer()->notNull(),
            'created' => $this->timestamp(),
        ]);

        $this->createIndex('idx_created', self::TABLE, 'created');
        $this->createIndex('idx_theme', self::TABLE, 'theme_id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
