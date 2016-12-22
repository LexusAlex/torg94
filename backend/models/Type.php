<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Record[] $records
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
        ];
    }
    public function getRecords()
    {
        return $this->hasMany(Record::className(), ['tid' => 'id'])->inverseOf('t');
    }

    /**
     * @inheritdoc
     * @return TypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TypeQuery(get_called_class());
    }
}