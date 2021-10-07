<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 07.10.21
 * Time: 23:24
 */

namespace app\components;


use app\models\PublicApiClient;
use Yii;
use yii\base\Component;
use yii\helpers\Json;

/**
 * Class TradernetApi
 * @package app\components
 */
class TradernetApi extends Component
{
    private $api;
    private $apiSecretKey;

    public function __construct()
    {
        $this->api = Yii::$app->params['api'];
        $this->apiSecretKey = Yii::$app->params['apiSecretKey'];
    }

    /**
     * @param $tickers
     * @return mixed
     */
    public function parse($tickers)
    {
        $publicApiClient = new PublicApiClient($this->api, $this->apiSecretKey, PublicApiClient::V2);

        $response = $publicApiClient->sendRequest('getStockQuotesJson', ['tickers' => $tickers]);
        return Json::decode($response);
    }
}
