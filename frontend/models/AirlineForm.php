<?php

namespace frontend\models;

use Yii;
use yii\base\Model;


class AirlineForm extends Model
{
    public $email;
    public $text;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email','text'], 'required'],
            [['email',], 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Ваш email',
            'text' => 'Ваш вопрос',
        ];
    }

    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email])
            ->setSubject('Вопрос на прямую линию')
            ->setTextBody('Вопрос c сайта TORG94.ru: '.$this->text)
            ->send();
    }

}