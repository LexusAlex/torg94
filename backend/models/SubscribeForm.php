<?php

namespace backend\models;

use Yii;
use yii\base\Model;


class SubscribeForm extends Model
{
    public $name = 'torg94.ru';
    public $subject;
    public $htmlBody;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['subject', 'htmlBody'], 'required'],
            // rememberMe must be a boolean value
            //['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            //['password', 'validatePassword'],
        ];
    }
}