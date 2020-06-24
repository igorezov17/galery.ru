<?php


use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Users;

$model = new Users();
$users = $model->getAll();
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'edit-form']) ?>


    <?= $form->field($model, 'email')?>
    <?= $form->field($model, 'username')->textArea(['value' => $userinfo->username])?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']); ?>
    </div>
<?php ActiveForm::end(); ?> 

