<?php

namespace backend\controllers;

use Yii;
use yii\base\Module;
use yii\web\Controller;
use backend\models\interfaces\ISiteConfigService;

class UserController extends BaseController
{
    public function __construct(
        $id,
        Module $module,
        ISiteConfigService $siteConfigService,
        $config = []
    )
    {
        parent::__construct($id, $module, $siteConfigService, $config);
    }

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'expression' => '$user->isAdmin()',
            ),
            //array('allow', // allow authenticated user to perform 'create' and 'update' actions
            //'actions'=>array('create','update'),
            //	'users'=>array('@'),
            //),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );

    }

    public function actionIndex()
    {

    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='Link-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
