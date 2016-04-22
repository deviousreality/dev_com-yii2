<?php

namespace tests\codeception\backend\unit\models;


use Yii;
use backend\models\PostService;
use tests\codeception\backend\unit\DbTestCase;
use tests\codeception\common\fixtures\PostFixture;

class PostServiceTest extends DbTestCase
{
    private $postService;

    protected function setUp()
    {
        $this->postService = new PostService();
        parent::setUp();
    }

    public function testGetPostByID__ValidID_ReturnPost()
    {
        //arrange
        $postID = 1;
        $siteID = 1;

        //act
        $result = $this->postService->getPost($postID, $siteID);

        //assert
        $this->assertNotEmpty($result);
        $this->assertNotNull($result);
    }

    public function testGetPostByID_InvalidID_ReturnNull()
    {
        //arrange
        $postID = 2;
        $siteID = 1;

        //act
        $result = $this->postService->getPost($postID, $siteID);

        //assert
        $this->assertEmpty($result);
        $this->assertNull($result);
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function fixtures()
    {
        return [
            'siteconfig' => [
                'class' => PostFixture::className(),
                'dataFile' => '@tests/codeception/common/unit/fixtures/data/models/post.php'
            ],

        ];
    }
}