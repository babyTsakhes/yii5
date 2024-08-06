<?php

namespace backend\controllers;


use Yii;

use yii\rest\ActiveController;

use common\models\User;

/**
 * Site controller
 */
class UserController extends ActiveController
{
    public $modelClass = User::class;

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
         
            'update' => [
                'class' => 'yii\rest\UpdateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->updateScenario,
            ],
            'delete' => [
                'class' => 'yii\rest\DeleteAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
   

     public function actionCreate(){
        $model = new User();
      // 
        $model->load(Yii::$app->getRequest()->getBodyParams(), '') ;
        $model->password_hash = password_hash($model->password_hash,PASSWORD_DEFAULT);
     //   die(var_dump($model->attributes));
        if($model->save()){
            return "Success!";
        }
     }
     public function actionAuth($username, $password, $password_hash = "1234"){
        $user = User::findOne(['username'=>$username]);
        
        if(password_verify($password, $user->password_hash ) ){
            $_SESSION['auth_data'] = [true, ['user_id'=>$user->id, 'username'=>$user->username]];
            return "Success!";
        
     }
     return false;
     
}
}