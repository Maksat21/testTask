<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tickers */

$this->title = 'Update Tickers: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tickers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tickers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
