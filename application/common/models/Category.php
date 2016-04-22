<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $siteID
 * @property integer $categoryID
 * @property string $title

 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['siteID', 'title'], 'required'],
            [['siteID', 'categoryID'], 'integer', 'integerOnly'=>true],
        	[['title'], 'string', 'max'=>255],
        	[['categoryID', 'title', 'safe'], 'on'=>'search']
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'siteID' => 'SiteID',
			'categoryID' => 'ID',
			'title' => 'Category'
        ];
    }
}
