<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>


<h1>Создание нового фото</h1>

<?php $form=ActiveForm::begin(); ?>

<?php echo $form->field($model, 'title'); ?>

<?php echo $form->field($model, 'image'); ?>


<?php echo Html::submitButton('Save', ['class' => 'btn btn-primary'])?>


<?php $form=ActiveForm::end(); ?>

