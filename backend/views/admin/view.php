<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">

            <h2 class="header-title m-t-0 m-b-30"><?= Html::encode($this->title) ?></h2>

            <div class="admin-view">


                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'username',
                        'email:email',
                        'nama',
                        'password_hash',
                        'password_reset_token',
                        'auth_key',
                        'avatar',
                        'tempat_lahir',
                        'tanggal_lahir',
                        'alamat',
                        'status',
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>

            </div>

        </div>
    </div><!-- end col -->

</div>

