<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="l-row">
    <div class="columns column-5-of-5">
        <div class="m-box">
            <div class="m-box-header">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="m-box-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'errorOptions' => ['class' => 'm-form-help-text has-error'],
                        'inputOptions' => ['class' => 'm-form-input'],
                        'labelOptions' => ['class' => 'm-form-label'],
                        'options' => ['class' => 'm-form-group l-row'],
                        'template' => $this->renderFile('@backend/views/partials/form/_field.php')
                    ],
                    'options' => ['class' => 'm-form']

                ]); ?>
                <?=$form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'm-checkbox'], false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'm-button m-button-primary', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
