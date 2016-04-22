<?php

namespace tests\codeception\backend\unit\models;

use Yii;
use backend\models\SiteConfigService;
use tests\codeception\backend\unit\DbTestCase;
use tests\codeception\common\fixtures\SiteConfigFixture;

class SiteConfigServiceTest extends DbTestCase
{
    private $configService;

    protected function setUp()
    {
        $this->configService = new SiteConfigService();
        parent::setUp();
    }

    public function testGetConfigBySiteID__ValidID_ReturnConfig()
    {
        //arrange
        $siteID = 1;

        //act
        $result = $this->configService->getConfig($siteID);

        //assert
        $this->assertNotEmpty($result);
        $this->assertNotNull($result);
    }

    public function testGetConfigBySiteID_InvalidID_ReturnNull()
    {
        //arrange
        $siteID = 2;

        //act
        $result = $this->configService->getConfig($siteID);

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
                'class' => SiteConfigFixture::className(),
                'dataFile' => '@tests/codeception/common/unit/fixtures/data/models/siteconfig.php'
            ],

        ];
    }
}