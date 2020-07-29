<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'login';
?>

<?php $form = ActiveForm::begin(); ?>

<?php echo $form->field($model, 'username'); ?>
<?php echo $form->field($model, 'lastname'); ?>
<?php echo $form->field($model, 'email'); ?>
<?php echo $form->field($model, 'password'); ?>

<?php echo Html::submitButton('login', ['class'=>'btn btn-success']); ?>

<?php ActiveForm::end(); ?>