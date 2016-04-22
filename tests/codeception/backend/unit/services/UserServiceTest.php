<?php

namespace tests\codeception\backend\unit\models;

use \AspectMock\Test as test;
use common\models\User;
use Yii;
use backend\models\UserService;
use tests\codeception\backend\unit\DbTestCase;
use tests\codeception\common\fixtures\UserFixture;

class UserServiceTest extends DbTestCase
{
    private $userService;

    protected function setUp()
    {
        $this->userService = new UserService();
        parent::setUp();
    }

    //GetUsers
    public function testGetUsersReturnUserList()
    {
        //arrange
        $siteID = 1;

        //act
        $result = $this->userService->getUsers($siteID);

        //assert
        $this->assertNotEmpty($result);
        $this->assertEquals(count($result), 2);
    }

    public function testGetUsersWithSiteIDNotFoundReturnNull()
    {
        //arrange
        $siteID = 3;

        //act
        $result = $this->userService->getUsers($siteID);

        //assert
        $this->assertEmpty($result);
    }

    //GetUser
    public function testGetUserByUserIDReturnUser()
    {
        //arrange
        $siteID = 1;
        $userID = 1;

        //act
        $result = $this->userService->getUser($siteID, $userID);

        //assert
        $this->assertEquals($result->name, "Firstname1 Lasename1");
    }

    public function testGetUserUserNotFoundReturnNull()
    {
        //arrange
        $siteID = 1;
        $userID = 3;

        //act
        $result = $this->userService->getUser($siteID, $userID);

        //assert
        $this->assertEmpty($result);
        $this->assertNull($result);
    }

    //EditUser

    public function testEditUserReturnTrue()
    {
        //arrange
        $siteID = 1;
        $userID = 1;

        $values = [
            'siteID' => 1,
            'userID' => 1,
            'name' => 'Harry Henderson'
        ];
        $userMock = new User();
        $userMock->setAttributes($this->user[0]);

        $ar = test::double('yii\db\ActiveRecord', ['save' => null]);
        test::double('common\models\User', ['save' => null]);

        $user = test::double($userMock);
        $user->name = 'Harry Henderson';
        //$u->update();

        codecept_debug(var_dump($user));
//die();
        //$user = test::double('common\models\User', [
        //    'update' => null
        //]);


        //act
        $result = $this->userService->editUser($siteID, $userID, $user->getObject());

        //assert
        $this->assertTrue($result);
        $user->verifyInvoked('update');

    }

    protected function tearDown()
    {
        test::clean();
        parent::tearDown();
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
