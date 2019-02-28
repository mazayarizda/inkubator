<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 08/02/18
 * Time: 10:19
 */
use backend\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/inkubator/backend/web/favicon.ico']);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>


<?= $content ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
