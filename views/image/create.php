<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\ActiveForm;

?>
      <section class="hero is-warning">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              Новые события - новые фотографии!
            </h1>
            <h2 class="subtitle">
              Заполните форму и пополните вашу галерею.
            </h2>
          </div>
        </div>
      </section>
      <div class="container main-content">

        <div class="columns">
          <div class="column"></div>
          <div class="column is-quarter auth-form">
            <!--<div class="notification is-success">
                Спасибо! Картинка успешно загружена!
            </div>-->
            <?php //echo flash(); ?>
          <!-- <form action="/photo/store" method="GET" enctype="multipart/form-data"> -->
          <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'title')->textInput() ?>

                <?= $form->field($model, 'description') ?>

                <?= $form->field($model, 'image[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

                <div class="field">
              <label >Выберите категорию</label>
              <div class="control">
                <div class="select">
                  <select name="category_id">
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?=$category['title']; ?></option>

                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>



            <?php ActiveForm::end(); ?>
                    <!-- </form> -->
          </div>
          <div class="column"></div>
        </div>
      </div>
