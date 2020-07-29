<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Создание пользователя</h1>

<?php $form = ActiveForm::begin();?>

<?php echo $form->field($model, 'username'); ?>

<?php echo $form->field($model, 'email'); ?>

<?php echo $form->field($model, 'image'); ?>

<div class="form-group">
    <?= Html::submitButton('create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>

<?php ActiveForm::end(); ?>


