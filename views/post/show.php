<?php  $this->beginBlock('block1'); ?>
<p>That is SHOW<p>
<?php $this->endBlock(''); ?>
<?php
use app\components\Widgets;
?>


<?php /*foreach ( $cats as $cat) // вывод title(по названию)
{
    echo $cat->title. "<br>";
}*/?>

<?php //debug($cats) ?>
<?php //echo count($cats[0]->products) ?>
<?php //debug($cats) ?>

<?php echo MyWidget::wiget() ?>

<button class="btn btn-success" id="btn">Click me...</button>

<?php //$this->registerJsFile('@web/js/scripts.js',  ['depends' => 'yii\web\YiiAsset']) ?>
<?php //$this->registerJs("$('.container').append('<h1>show!!!<h1>');", \yii\web\View::POS_LOAD) ?>

<?php //$this->registerCss('.container{background: #ccc;}') ?>

<?php 

$js = <<< JS
$('#btn').on('click', function()
{  
    $.ajax({
        url:'index.php?r=post/index',   
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