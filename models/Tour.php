<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tour".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $created_at
 *
 * @property CustomField[] $customFields
 */
class Tour extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomFields()
    {
        return $this->hasMany(CustomField::className(), ['tour_id' => 'id'])->orderBy(['sort' => SORT_ASC]);
    }

    public function beforeValidate(){
        if ($this->isNewRecord){
            $this->created_at = time();
        }
        return true;
    }

    public function generateDefaultFields()
    {
        if ($this->isNewRecord){
            $this->populateRelation('customFields', [
                new CustomField(['name' => 'Grown Peoples Count', 'sort' => 0]),
                new CustomField(['name' => 'Children Count', 'sort' => 1]),
                new CustomField(['name' => 'Babies Count', 'sort' => 2])]);
        }
    }

    public function substrDescription(){
        $result = mb_substr(strip_tags($this->description), 0, 301, "UTF-8");
        $result .= strlen(strip_tags($this->description)) > 301 ? '...' : '';
        return $result;
    }

}
