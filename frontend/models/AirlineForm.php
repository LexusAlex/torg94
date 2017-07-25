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
        /*return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email])
            ->setSubject('Вопрос на прямую линию')
            ->setTextBody('Вопрос c сайта TORG94.ru: '.$this->text)
            ->send();*/
        // текст письма
        $message = '
            <html>
            <head>
              <title>Вопрос c сайта TORG94.ru</title>
            </head>
            <body>
              <p>email: '.$this->email.'</p>
              <p>Вопрос c сайта TORG94.ru:</p>
              <p>'. $this->text. '</p>
            </body>
            </html>
            ';

// Для отправки HTML-письма должен быть установлен заголовок Content-type
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Дополнительные заголовки

// Отправляем
        mail($email, 'Вопрос на прямую линию', $message, $headers);
    }

}