<?php

use yii\db\Migration;

/**
 * Handles the creation of table `review`.
 */
class m180218_153106_create_review_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('review', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'value' => $this->smallInteger()->notNull(),
            'name' => $this->string(64)->notNull(),
            'text' => $this->text(),
            'link' => $this->string(),
            'page_id' => $this->integer(),
            'position' => $this->integer()->notNull()->defaultValue(0),
            'enabled' => $this->boolean()->notNull()->defaultValue(1),
        ], $tableOptions);

        $this->addForeignKey('fk-review-page_id', 'review', 'page_id', 'page', 'id', 'SET NULL');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('fk-review-page_id', 'review');

        $this->dropTable('review');
    }
}
