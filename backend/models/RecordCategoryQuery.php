<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[RecordCategory]].
 *
 * @see RecordCategory
 */
class RecordCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RecordCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RecordCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
