
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Scholl это великолепно</h1>
<?php //debug($model); ?>
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'name')->label('Имя') ?>
<?= $form->field($model,'password')->label('Пароль')->passwordInput() ?>
<?= $form->field($model,'email') ?>
<?= $form->field($model,'text')->label('Текст')->textarea(['rows'=>5]) ?>
<?php $form = ActiveForm::end() ?>
<button class = "btn btn-success" id = "btn">Click me...</button>
<?php //$this->registerJs("$('.container').append('<h1>show!!!<h1>');", \yii\web\View::POS_LOAD) ?>

<?php //$this->registerCss('.container{background: #ccc;}') ?>

<?php 
$js = <<< JS
$('#btn').on('click', function()
{  
    $.ajax({
        url:'index.php?r=sam/dexter',   
        data: {test: '123'}, 
        type: 'GET', 
        success: function (res) { 
            console.log(res)
        },
        error: function(){
            alert('Error');
        } 
    });
});  
JS;
$this->registerJs($js);
?>
