<?php

namespace backend\models;

use Yii;
use common\models\Post;
use backend\models\interfaces\IPostService;

class PostService extends \yii\base\Object implements IPostService
{
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    public function getPost($postID, $siteID)
    {
        return Post::findOne([
            'postID' => $postID,
            'siteID' => $siteID
        ]);
    }

}
