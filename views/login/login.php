<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>



<?php $form = ActiveForm::begin() ?>

<?php echo $form->field($model , 'email')->textInput(); ?>

<?php echo $form->field($model , 'password')->passwordInput(); ?>

<?= Html::submitButton('Login', ['class'=>'btn btn-success']) ?>

<?php $form = ActiveForm::end() ?>