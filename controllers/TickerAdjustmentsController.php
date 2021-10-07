<?php

namespace app\controllers;

use app\models\TickerAdjustments;
use app\models\TickerAdjustmentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TickerAdjustmentsController implements the CRUD actions for TickerAdjustments model.
 */
class TickerAdjustmentsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TickerAdjustments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TickerAdjustmentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
