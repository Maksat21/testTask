<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticker_adjustments".
 *
 * @property int $id
 * @property int|null $ticker_id
 * @property float|null $bap
 * @property float|null $bbp
 * @property float|null $spread
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class TickerAdjustments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticker_adjustments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticker_id'], 'integer'],
            [['bap', 'bbp', 'spread'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticker_id' => 'Ticker ID',
            'bap' => 'Bap',
            'bbp' => 'Bbp',
            'spread' => 'Spread',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
