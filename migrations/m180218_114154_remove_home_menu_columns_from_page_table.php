<?php

use yii\db\Migration;

/**
 * Class m180218_114154_remove_home_menu_columns_from_page_table
 */
class m180218_114154_remove_home_menu_columns_from_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->dropColumn('page', 'home');

        $this->dropColumn('page', 'menu');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->addColumn('page', 'home', 'boolean not null default 0');

        $this->addColumn('page', 'menu', 'boolean not null default 0');
    }
}
