<?php

namespace app\controllers\behaviors;

use Yii;
use yii\base\Behavior;

class AccessBehavior extends Behavior
{
    public function checkAccess()
    {
        if (Yii::$app->user->isGuest)
        {
            return $this->redirect('/');
        }

        
    }
}