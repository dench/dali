<?php

namespace app\models;

use dench\page\models\Page;
use dench\sortable\behaviors\SortableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property int $created_at
 * @property int $value
 * @property string $name
 * @property string $text
 * @property string $link
 * @property int $page_id
 * @property int $position
 * @property bool $enabled
 *
 * @property Page $page
 */
class Review extends ActiveRecord
{
    const DISABLED = 0;
    const ENABLED = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            SortableBehavior::className(),
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'name'], 'required'],
            [['value', 'page_id', 'position'], 'integer'],
            [['enabled'], 'boolean'],
            [['enabled'], 'default', 'value' => self::ENABLED],
            [['enabled'], 'in', 'range' => [self::ENABLED, self::DISABLED]],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 60],
            [['link'], 'string', 'max' => 255],
            [['text', 'name', 'link'], 'trim'],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['page_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => Yii::t('app', 'Created'),
            'value' => Yii::t('app', 'Value'),
            'name' => Yii::t('app', 'Your name'),
            'text' => Yii::t('app', 'Text'),
            'link' => Yii::t('app', 'Link'),
            'page_id' => Yii::t('app', 'Page'),
            'position' => Yii::t('app', 'Position'),
            'enabled' => Yii::t('app', 'Enabled'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }
}
