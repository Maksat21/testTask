<?php

namespace app\commands;

use app\models\Tickers;
use app\services\ParseService;
use Yii;
use Exception;
use yii\console\Controller;
use app\components\TradernetApi;

/**
 * Class ParserController
 * @package app\commands
 */
class ParserController extends Controller
{
    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function actionParse()
    {
        /** @var TradernetApi $api */
        $api = Yii::$app->get('tradernetApi');

        try {
            /**
             * @param Tickers $tickers
             */
            $tickers = Tickers::find()->where(['status' => 1])->all();
            foreach ($tickers as $ticker) {
                $result = $api->parse($ticker->name);
                ParseService::saveParseInfo($result);
            }

        } catch (Exception $e){
            // Можно в логи хранить ошибки, не стал создавать таблицу логов
        }
    }
}
