<?php 

namespace app\components\behaviors;

use yii\base\Behavior;

class MyBehavior extends Behavior
{
    public $first = 'first';
    public $second = 'second';

    public function foo()
    {
        return $this->first;
    }
}