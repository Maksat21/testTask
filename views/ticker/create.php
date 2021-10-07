<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tickers */

$this->title = 'Create Tickers';
$this->params['breadcrumbs'][] = ['label' => 'Tickers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tickers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
