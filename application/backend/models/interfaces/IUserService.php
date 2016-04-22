<?php

namespace backend\models\interfaces;

use yii\db\ActiveRecord;
use common\models\User;

interface IUserService
{

    function getUsers($siteID);

    function getUser($siteID, $userID);

    function editUser($siteID, $userID, $user);

}
