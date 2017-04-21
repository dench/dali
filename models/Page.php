<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 16.03.17
 * Time: 21:23
 */

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * Class Page
 * @package app\models
 *
 * @property boolean $home
 * @property boolean $menu
 * @property string $cover
 */

class Page extends \dench\page\models\Page
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['home', 'menu'], 'boolean'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'home',
            'menu'
        ]);
    }

    public function getCover()
    {
        return '';
        //return ImageHelper::thumb($this->images[0]->id);
    }
}