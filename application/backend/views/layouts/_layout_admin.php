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
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php echo $this->render('@app/views/partials/modules/_headerScripts') ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php echo $this->render('@app/views/partials/layout/_siteMenu') ?>

<main role="main" id="main" class="l-main">

    <div class="row">
        <div class="navbar-header">
            <a href="#" class="navbar-minimalize minimalize-styl-2 btn btn-primary "><i class="fa fa-bars"></i> </a>
            <!--<form action="search_results.html" class="navbar-form-custom" role="search">
                <div class="form-group">
                    <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search for something...">
                </div>
            </form>-->
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="login.html">
                    <svg class="m-nav__icon icon--sign-out"><use xlink:href="/dist/vendors/icons.svg#icon-sign-out"></use> </svg> Log out
                </a>
            </li>
        </ul>
    </div>

    <?php echo $content ?>

    <footer class="l-footer">
        <strong>Copyright</strong> Deviousreality &copy; 2016
    </footer>
</main>

<?php echo $this->render('@app/views/partials/modules/_footerScripts') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
