<?php

use yii\db\Migration;

class m170316_191635_add_column_home_menu_to_page_table extends Migration
{
    public function up()
    {
        $this->addColumn('page', 'home', 'boolean not null default 0');

        $this->addColumn('page', 'menu', 'boolean not null default 0');
    }

    public function down()
    {
        $this->dropColumn('page', 'home');

        $this->dropColumn('page', 'menu');
    }
}
