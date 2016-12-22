<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "record".
 *
 * @property integer $id
 * @property string $title
 * @property string $date
 * @property integer $archive
 * @property integer $status
 * @property string $author
 * @property string $link
 * @property string $picture_annotation
 * @property string $picture_text
 * @property string $annotation
 * @property string $text
 * @property integer $tid
 * @property string $type
 *
 * @property Type $t
 */
class Record extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'status', 'annotation', 'text','date'], 'required'],
            //[['date'], 'safe'],
            //['date', 'default', 'value' => date('yyyy-MM-dd HH:mm:ss') ],
            [['archive', 'status', 'tid'], 'integer'],
            [['annotation', 'text'], 'string'],
            [['title', 'author', 'link', 'picture_annotation', 'picture_text'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 4],
            [['tid'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['tid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'date' => 'Дата и время публикации',
            'archive' => 'Архив',
            'status' => 'Статус',
            'author' => 'Автор',
            'link' => 'Ссылка',
            'picture_annotation' => 'Picture Annotation',
            'picture_text' => 'Изображение к тексту путь до файла',
            'annotation' => 'Аннотация к публикации',
            'text' => 'Текст публикации',
            'tid' => 'Тип публикации',
            'type' => 'Тип',
        ];
    }

    /**
     * Таблица Type
     * @return \yii\db\ActiveQuery
     */
    public function getT()
    {
        return $this->hasOne(Type::className(), ['id' => 'tid'])->inverseOf('records');
    }
    /**
     * @inheritdoc
     * @return RecordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecordQuery(get_called_class());
    }
}