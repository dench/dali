<?php

namespace app\models;

use dench\image\models\Image;
use dench\language\behaviors\LanguageBehavior;
use dench\sortable\behaviors\SortableBehavior;
use omgdef\multilingual\MultilingualQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "home".
 *
 * @property int $id
 * @property int $created_at
 * @property string $link
 * @property int $image_id
 * @property int $position
 * @property bool $enabled
 *
 * @property string name
 * @property string description
 *
 * @property Image $image
 * @property Page $page
 */
class Home extends ActiveRecord
{
    const DISABLED = 0;
    const ENABLED = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'home';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            LanguageBehavior::className(),
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
            [['name'], 'required'],
            [['image_id', 'page_id', 'position'], 'integer'],

            [['enabled'], 'boolean'],
            [['enabled'], 'default', 'value' => self::ENABLED],
            [['enabled'], 'in', 'range' => [self::ENABLED, self::DISABLED]],

            [['link', 'name', 'description'], 'string', 'max' => 255],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
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
            'link' => Yii::t('app', 'Link'),
            'page_id' => Yii::t('app', 'Page'),
            'image_id' => Yii::t('app', 'Image'),
            'position' => Yii::t('app', 'Position'),
            'enabled' => Yii::t('app', 'Enabled'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return MultilingualQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    public function getPageLink()
    {
        if (empty($this->link)) {
            if (in_array(2, $this->page->parent_ids)) {
                return Url::to(['portfolio/category', 'slug' => $this->page->slug]);
            } if (in_array(3, $this->page->parent_ids)) {
                return Url::to(['services/view', 'slug' => $this->page->slug]);
            } else {
                return Url::to(['portfolio/view', 'slug' => $this->page->slug]);
            }
        }
    }
}
