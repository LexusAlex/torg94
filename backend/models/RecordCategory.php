<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "record_category".
 *
 * @property integer $record_id
 * @property integer $category_id
 *
 * @property Category $category
 * @property Record $record
 */
class RecordCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'record_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'category_id'], 'required'],
            [['record_id', 'category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => Record::className(), 'targetAttribute' => ['record_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'record_id' => 'Record ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id'])->inverseOf('recordCategories');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Record::className(), ['id' => 'record_id'])->inverseOf('recordCategories');
    }

    /**
     * @inheritdoc
     * @return RecordCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecordCategoryQuery(get_called_class());
    }
}
