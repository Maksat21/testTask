<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TickerAdjustmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ticker Adjustments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticker-adjustments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ticker Adjustments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'ticker_id',
            [
                'attribute' => 'ticker_id',
                'label' => Yii::t('app', 'ticker_id'),
                'options' => ['width' => 125],
                'value' => function(\app\models\TickerAdjustments $model){
                    return \app\models\Tickers::findOne($model->ticker_id)->name;
                },
                'filter' => ArrayHelper::map(\app\models\Tickers::find()->all(), 'id', 'name'),
            ],
            'bap',
            'bbp',
            'spread',
            [
                'attribute' => 'created_at',
                'value' => 'created_at',
                'filter' => DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'created_at',
                    'language' => 'ru',
                    'dateFormat' => 'php:Y-m-d H:i:s',
                ]),
                'format' => 'html',
            ],
            //'updated_at',
        ],
    ]); ?>


</div>
