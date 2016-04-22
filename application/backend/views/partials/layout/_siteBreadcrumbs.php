<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
?>

<div class="row">
    <div class="col-lg-10">
        <h2><?php echo Html::encode($this->title); ?></h2>
        <?php echo Breadcrumbs::widget([
            'activeItemTemplate' => "<li class=\"active\"><strong>{link}</strong></li>\n",
            'itemTemplate' => "<li>{link}</li>\n",
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' => ['class' => 'breadcrumb'],
            'tag' => 'ol'
        ]);
        ?>
    </div>
    <div class="col-lg-2"></div>
</div>
