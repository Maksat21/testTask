<?php
/**
 * Created by PhpStorm.
 * User: maks
 * Date: 07.10.21
 * Time: 23:35
 */

namespace app\services;


use app\models\TickerAdjustments;
use app\models\Tickers;

class ParseService
{

    /**
     * @param $data
     */
    public static function saveParseInfo($data)
    {
        foreach ($data['result']['q'] as $datum) {
            $ticker = new TickerAdjustments();
            $ticker->ticker_id = Tickers::findOne(['name' => $datum['c']])->id;
            $ticker->bap = $datum['bap'];
            $ticker->bbp = $datum['bbp'];
            $ticker->spread = self::getSpread($datum['bap'],$datum['bbp']);
            $ticker->created_at = date('Y-m-d H:i:s');
            $ticker->updated_at = date('Y-m-d H:i:s');
            if (!$ticker->save()) {
                return new \DomainException($datum['c']);
            }
        }
    }

    /**
     * @param $bap
     * @param $bbp
     */
    public static function getSpread($bap,$bbp)
    {
        $spread = 0;
        if ($bap != 0) {
            return $spread = ($bap-$bbp)/$bap;
        }
        return $spread;
    }

}