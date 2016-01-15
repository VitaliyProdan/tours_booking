<?php

namespace app\models;

use Yii;
use DateTime;

/**
 * This is the model class for table "booking".
 *
 * @property integer $id
 * @property integer $tour_id
 * @property string $result
 * @property integer $created_at
 * @property $date
 *
 * @property Tour $tour
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'required'],
            [['tour_id', 'created_at'], 'integer'],
            [['result'], 'string'],
            [['date'], 'date', 'format'=>'yyyy-M-d']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tour_id' => 'Tour ID',
            'result' => 'Result',
            'created_at' => 'Created At',
            'date' => 'Date'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTour()
    {
        return $this->hasOne(Tour::className(), ['id' => 'tour_id']);
    }

    public function beforeValidate(){
        if ($this->isNewRecord){
            $this->created_at = time();
        }
        return true;
    }

    public function getEncodedResults(){
        return json_decode($this->result);
    }

    public function getFormatedDate(){
        $date = new DateTime($this->date);
        return $date->format('jS F Y');
    }
}
