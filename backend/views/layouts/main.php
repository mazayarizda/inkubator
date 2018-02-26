<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\View;


AppAsset::register($this);
$this->registerAssetBundle(yii\web\JqueryAsset::className(), View::POS_HEAD);
$this->registerJsFile('@web/js/jquery.min.js');
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/inkubator/backend/web/favicon.ico']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="fixed-left widescreen">
<?php $this->beginBody() ?>
        <?= $this->render('header') ?>
        <?= $this->render('sidebar') ?>
        <?= $this->render('content',['content'=>$content]) ?>
        <?= $this->render('footer') ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
