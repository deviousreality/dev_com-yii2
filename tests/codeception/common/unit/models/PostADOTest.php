<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 10/7/2015
 * Time: 5:41 PM
 */

namespace codeception\common\unit\models;

use common\models\Post;
use tests\codeception\common\fixtures\PostFixture;
use tests\codeception\common\unit\DbTestCase;

use \Codeception\Specify;

class PostADOTest extends DbTestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testPostModelValid()
    {
        //arrange

        //act
        $model = Post::findOne(1);

        //assert
        $this->assertTrue($model->siteID == 1);
        $this->assertTrue($model->postID ==  1);
        $this->assertTrue($model->userID ==  1);
        $this->assertTrue($model->publisheddate == date( 'Y-m-d H:i:s', mktime(0, 0, 0, 1, 1, 1970)));
        $this->assertTrue($model->modifieddate == date( 'Y-m-d H:i:s', mktime(0, 0, 0, 1, 1, 1970)));
    }

    public function fixtures()
    {
        return [
            'config' => [
                'class' => PostFixture::className(),
                'dataFile' => '@tests/codeception/common/unit/fixtures/data/models/post.php'
            ],
        ];
    }

}