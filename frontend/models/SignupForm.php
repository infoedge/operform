<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $email_repeat;
    public $password;
    public $password_repeat;
    public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            [['email','email_repeat'], 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['email_repeat',  'compare', 'compareAttribute' => 'email' ],

            [['password','password_repeat'], 'required'],
            ['password_repeat',  'compare', 'compareAttribute' => 'password' ],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            
            ['verifyCode', 'captcha'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'username'=>Yii::t('app','Username'),
            'email'=>Yii::t('app','E-mail'),
            'email_repeat'=>Yii::t('app','Confirm E-mail'),
            'password'=>Yii::t('app','Password'),
            'password_repeat'=>Yii::t('app','Confirm Password'),
            'verifyCode' => Yii::t('app','Verification Code'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
