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
 * @property RecordCategory[] $recordCategories
 * @property Category[] $categories
 * @property array $categoryArray
 */
class Record extends \yii\db\ActiveRecord
{
    public $cat;
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
            [['categoryArray'], 'safe'],
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
            'categoryArray' => 'Категории статей',
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
     * @return \yii\db\ActiveQuery
     */
    public function getRecordCategories()
    {
        //return $this->hasMany(RecordCategory::className(), ['record_id' => 'id'])->inverseOf('record');
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('record_category', ['record_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('record_category', ['record_id' => 'id']);
    }
    /**
     * @inheritdoc
     * @return RecordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecordQuery(get_called_class());
    }

    // Tags
    private $_categoryArray;

    public function getCategoryArray()
    {
        if ($this->_categoryArray === null) {
            $this->_categoryArray = $this->getRecordCategories()->select('id')->column();
        }
        return $this->_categoryArray;
    }

    public function setCategoryArray($value)
    {
        $this->_categoryArray = (array)$value;
    }
    // После сохранения модели
    public function afterSave($insert, $changedAttributes)
    {
        $this->updateCategories(); // обновление тегов у записей
        parent::afterSave($insert, $changedAttributes);
    }

    private function updateCategories()
    {
        $currentTagIds = $this->getRecordCategories()->select('id')->column(); // теги которые имеются у записи
        $newTagIds = $this->getCategoryArray(); // отмеченные новые теги в форме или убранные
        // добавляем связи
        foreach (array_filter(array_diff($newTagIds, $currentTagIds)) as $tagId) {
            /** @var Category $tag */
            if ($tag = Category::findOne($tagId)) {
                $this->link('recordCategories', $tag);
            }
        }
        // удаляем связи
        foreach (array_filter(array_diff($currentTagIds, $newTagIds)) as $tagId) {
            /** @var Category $tag */
            if ($tag = Category::findOne($tagId)) {
                $this->unlink('recordCategories', $tag, true);
            }
        }
    }
}