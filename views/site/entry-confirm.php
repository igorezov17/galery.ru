<?php

use yii\helpers\Html;

?>

<p>Вы ввели следующие данные</p>

<ul>
<li><label for="">Name</label>:<?php echo Html::encode($model->name) ?></li>
<li><label for="">Email</label>:<?php echo Html::encode($model->email) ?></li>
    
    
</ul>