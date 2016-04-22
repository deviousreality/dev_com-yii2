<?php

namespace codeception\common\unit\models;

use common\models\User;
use tests\codeception\common\fixtures\UserFixture;
use tests\codeception\common\unit\DbTestCase;

use \Codeception\Specify;

class UserADOTest extends DbTestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testUserModelValid()
    {
        //arrange

        //act
        $model = User::findOne(1);

        //assert
        $this->assertTrue($model->userID == 1);
        $this->assertTrue($model->name == "Firstname1 Lasename1");
        $this->assertTrue($model->email == "me@example1.com");
    }

    public function fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => '@tests/codeception/common/unit/fixtures/data/models/user.php'
            ],
        ];
    }
}