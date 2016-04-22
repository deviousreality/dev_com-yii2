<?php

namespace backend\models;

use Yii;
use common\models\SiteConfig;
use backend\models\interfaces\ISiteConfigService;

/**
 * SiteConfigService represents the model behind the search form about `common\models`.
 */
class SiteConfigService extends \yii\base\Object implements ISiteConfigService
{
	const CONFIG_CACHE = 'SiteConfig_SiteID_%d';

    public function __construct($config = [])
    {
        parent::__construct($config);
    }

	public function getConfig($siteID)
	{
        $cacheName = sprintf(self::CONFIG_CACHE, $siteID);
        $model = Yii::$app->cache->get($cacheName);
        if($model === false)
        {
            $model = SiteConfig::findOne($siteID);
            Yii::$app->cache->set($cacheName, $model, 86400);
        }
		return $model;
	}

}
