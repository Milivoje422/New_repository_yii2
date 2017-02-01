<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_files`.
 */
class m170111_205212_create_news_files_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news_files', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer()->notNull()->defaultValue(0),
            'file_id' => $this->integer()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news_files');
    }
}
