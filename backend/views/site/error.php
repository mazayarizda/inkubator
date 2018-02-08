<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">

            <div class="site-error">

                <h1><?= Html::encode($this->title) ?></h1>

                <div class="alert alert-danger">
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <p>
                    Halaman yang anda cari tidak ditemukan.
                </p>
                <p>
                    Mohon hubungi kami jika ini merupakan kesalahan pada server. Terima Kasih.
                </p>

            </div>
        </div>
    </div><!-- end col -->

</div>

