<?php

namespace backend\controllers;

use Yii;
use yii\base\Module;
use yii\web\Controller;
use backend\models\interfaces\ISiteConfigService;

class BaseController extends Controller
{
    protected $siteConfigService;

    public function __construct(
        $id,
        Module $module,
        ISiteConfigService $siteConfigService,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->siteConfigService = $siteConfigService;
        $this->onExecuting();
    }

    /**
     * @var Stores DB Config
     */
    public $SiteConfig = null;

    /**
     * @var Layout View
     */
    public $layout = null;

    public function init()
    {
        $this->layout = "@app/views/layouts/_layout_admin";
    }

    private function onExecuting()
    {
        $this->SiteConfig = $this->siteConfigService->getConfig(Yii::$app->params['siteID']);
    }
}