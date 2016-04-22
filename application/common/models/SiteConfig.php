<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%siteconfig}}".
 *
 * @property integer $siteID
 * @property string $name
 * @property string $homedirectory
 * @property string $admindirectory
 * @property string $uploaddirectory
 * @property string $tempdirectory
 * @property string $adminemail
 */
class SiteConfig extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%siteconfig}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'adminemail'], 'string', 'max'=>100],
            [['sitedomain', 'homedirectory', 'admindirectory', 'uploaddirectory', 'tempdirectory', 'adminemail'], 'string', 'max'=>255],
        	['adminemail', 'email'],
        	[['siteID', 'name', 'sitedomain', 'safe'], 'on'=>'search']
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'siteID' => 'ID',
			'name' => 'Site Name',
			'sitedomain' => 'Site Domain',
			'homedirectory' => 'Base',
			'admindirectory' => 'Admin',
			'uploaddirectory' => 'File Upload',
			'tempdirectory' => 'Temp Folder',
			'adminemail' => 'Admin Email'
        ];
    }
}
