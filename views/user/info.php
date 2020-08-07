
<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
        <div class="columns">
            <div class="column">
              <div class="tabs is-centered pt-100">
                <ul>
                  <li class="is-active">
                    <a href="/user/info">
                      <span class="icon is-small"><i class="fas fa-user"></i></span>
                      <span>Основная информация</span>
                    </a>
                  </li>
                  <li>
                    <a href="/user/security">
                      <span class="icon is-small"><i class="fas fa-lock"></i></span>
                      <span>Безопасность</span>
                    </a>
                  </li>
                </ul>
                
              </div>
              <div class="is-clearfix"></div>
                <div class="columns is-centered">
                  <div class="column is-half">
                  <?php if( Yii::$app->session->hasFlash('success')){
                      echo Yii::$app->session->getFlash('success');
                  } else {
                    echo Yii::$app->session->getFlash('warning');
                  }
                  
                  ?>
                  
                  <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="field">
                    <!-- <h6>Name</h6> -->
                      <div class="control has-icons-left has-icons-right">
                      <?= $form->field($model, 'username')->textInput() ?>
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>

                    <div class="field">

                      <div class="control has-icons-left has-icons-right">
                      <!-- <h6>Email</h6> -->
                      <?= $form->field($model, 'email') ?>
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>

                    <div class="field">
                    <!-- <h6>Avatar</h6> -->
                                <div class="control has-icons-left has-icons-right">
                                <?= $form->field($model, 'image[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?> <br> <br>
                                    <img src="../uploads/<?= $user['image'] ?>" alt="">
                                </div>
                                </div>

                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                    <?php ActiveForm::end(); ?>
                  </div>
                </div>
            </div>
        </div>
      </div>
     