<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<h1>Изменение картинки</h1>

<?php $form = ActiveForm::begin(); ?>

<?php echo $form->field($model, 'title') ?>
<?php echo $form->field($model, 'image') ?>

<?php echo Html::submitButton('Update', ['class' => 'btn btn-success']);?>

<?php ActiveForm::end(); ?>