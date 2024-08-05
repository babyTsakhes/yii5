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
}
