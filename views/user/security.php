<?php 

  use yii\helpers\Html;
  use yii\widgets\ActiveForm;

?>   
        <div class="columns">
            <div class="column">
              <div class="tabs is-centered pt-100">
                <ul>
                <li>
                    <a href="/user/profile">
                      <span class="icon is-small"><i class="fas fa-user"></i></span>
                      <span>Профиль</span>
                    </a>
                  </li>
                  <li>
                    <a href="/user/info">
                      <span class="icon is-small"><i class="fas fa-user"></i></span>
                      <span>Основная информация</span>
                    </a>
                  </li>
                  <li class="is-active">
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
                  <?php 
                        if( Yii::$app->session->hasFlash('success')){
                          echo Yii::$app->session->getFlash('success');
                        } else {
                          echo Yii::$app->session->getFlash('warning');
                        }  
                  ?>
                  <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="field">
                      <div class="control has-icons-left has-icons-right">
                      <?php echo $form->field($model, 'oldpassword')->passwordInput(); ?>
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>

                    <div class="field">
                      <div class="control has-icons-left has-icons-right">
                      <?php echo $form->field($model, 'newpassword')->passwordInput(); ?>
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>

                    <div class="field">
                      <div class="control has-icons-left has-icons-right">
                      <?php echo $form->field($model, 'repeatPassword')->passwordInput(); ?>
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>
                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                  </div>
                  <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
      </div>
