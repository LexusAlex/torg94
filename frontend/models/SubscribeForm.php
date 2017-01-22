<?php

namespace frontend\models;

use backend\models\Subscribe;
use Yii;
use yii\base\Model;


class SubscribeForm extends Model
{
    public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email',], 'required'],
            [['email',], 'email'],
            ['email', 'validateIsEmail']
        ];
    }

    public function validateIsEmail($attribute, $params)
    {

        if (!$this->hasErrors()) {
            $model = Subscribe::find()->where([$attribute => $this->email])->one();
            if (!empty($model)){
                $this->addError($attribute, 'Ваш email уже зарегистрирован');
            }
            /*if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }*/
        }
    }
}