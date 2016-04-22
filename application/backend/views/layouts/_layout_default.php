<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php $this->render('@app/views/partials/modules/_headerScripts') ?>
</head>
<body>
<?php $this->beginBody() ?>

<main class="l-main" role="main" id="main">
    <?= $content ?>
</main>

<?php $this->render('@app/views/partials/modules/_footerScripts') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
