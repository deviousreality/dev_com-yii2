<?php

namespace backend\models;

use Yii;

use yii\db\ActiveRecord;
use common\models\User;
use backend\models\interfaces\IUserService;

class UserService extends \yii\base\Object implements IUserService
{
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    function getUsers($siteID)
    {
        return User::findAll([
            'siteID' => $siteID
        ]);
    }

    function getUser($siteID, $userID)
    {
        return User::findOne([
            'siteID' => $siteID,
            'userID' => $userID
        ]);
    }

    function editUser($siteID, $userID, $user)
    {
        $model = $this->getUser($siteID, $userID);
        if(empty($model))
            return false;

        $user->save();
        return true;
    }
}
