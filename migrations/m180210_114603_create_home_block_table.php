<?php

use yii\db\Migration;

/**
 * Handles the creation of table `home_block`.
 */
class m180210_114603_create_home_block_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('home', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'page_id' => $this->integer(),
            'link' => $this->string(),
            'image_id' => $this->integer(),
            'position' => $this->integer()->notNull()->defaultValue(0),
            'enabled' => $this->boolean()->notNull()->defaultValue(1),
        ], $tableOptions);

        $this->createTable('home_lang', [
            'home_id' => $this->integer()->notNull(),
            'lang_id' => $this->string(3)->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->addPrimaryKey('pk-home_lang', 'home_lang', ['home_id', 'lang_id']);

        $this->addForeignKey('fk-home_lang-home_id', 'home_lang', 'home_id', 'home', 'id', 'CASCADE');

        $this->addForeignKey('fk-home_lang-lang_id', 'home_lang', 'lang_id', 'language', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('fk-home-image_id', 'home', 'image_id', 'image', 'id', 'SET NULL');

        $this->addForeignKey('fk-home-page_id', 'home', 'page_id', 'page', 'id', 'SET NULL');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-home-page_id', 'home');

        $this->dropForeignKey('fk-home-image_id', 'home');

        $this->dropForeignKey('fk-home_lang-lang_id', 'home_lang');

        $this->dropForeignKey('fk-home_lang-home_id', 'home_lang');

        $this->dropPrimaryKey('pk-home_lang', 'home_lang');

        $this->dropTable('home_lang');

        $this->dropTable('home');
    }
}
