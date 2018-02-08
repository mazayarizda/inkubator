<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 25/01/18
 * Time: 13:45
 */
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
?>
<div class="content-page">
    <div class="content">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?=$content?>
        </div>
    </div>

</div>

