<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>


<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($foto, 'title'); ?>
    <?php echo $form->field($foto, 'description'); ?>



    <?php echo Html::submitButton('SAVE', ['class'=>'btn btn-success']);  ?>


<?php ActiveForm::end(); ?>