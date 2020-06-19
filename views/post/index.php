<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<h1> Index Action </h1>

<?php
//echo "выведи хоть что-то"
//debug ($model);
?>

<?php  $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name')->label('Имя')?>

<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'text')->label('Текст сообщения')->textarea(['rows'=>5]) ?>
<?= Html::submitButton('Отправить', ['class'=>"btn btn-success"]) ?>
 <?php   ActiveForm::end(); ?>
