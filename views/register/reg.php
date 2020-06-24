<?php 

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<h1>Регистрация</h1>
<?php $form = ActiveForm::begin(['class' => 'form-horizontal']); ?>

<?php echo $form->field($model, 'email')->textInput(['autofocus'=>true]) ?>

<?php echo $form->field($model, 'password')->passwordInput(); ?>

<div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>

<?php ActiveForm::end(); ?>