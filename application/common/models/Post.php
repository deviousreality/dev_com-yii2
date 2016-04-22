<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%posts}}".
 *
 * @property integer $siteID
 * @property integer $postID
 * @property integer $userID
 * @property datetime $dateadded
 * @property datetime $publisheddate
 * @property datetime $modifieddate
 * @property string $title
 * @property string $alias
 * @property string $content
 * @property integer $categoryID
 * @property string $status
 * @property string $type
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%posts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['siteID', 'userID', 'publisheddate', 'title', 'alias', 'content', 'categoryID', 'status', 'type'], 'required'],
            [['siteID', 'userID', 'categoryID'], 'integer'],
            [['dateadded', 'publisheddate', 'modifieddate'], 'safe'],
            [['content'], 'string'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['status', 'type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'postID' => 'ID',
            'userID' => 'Author',
            'publisheddate' => 'Date Published',
            'modifieddate' => 'Date Modified',
            'title' => 'Title',
            'alias' => 'Alias',
            'content' => 'Content',
            'categoryID' => 'Category',
            'status' => 'Status',
            'type' => 'Type'
        ];
    }
}
