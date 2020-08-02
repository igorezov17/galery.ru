
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
                    <div class="field">
                    <h6>Name</h6>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" value="marlin">
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>

                    <div class="field">

                      <div class="control has-icons-left has-icons-right">
                      <h6>Email</h6>
                        <input class="input" type="text" value="rahim@marlindev.ru">
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>

                    <div class="field">
                    <h6>Avatar</h6>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="file" name="image"> <br> <br>
                                    <img src="../uploads/<?= $user['image'] ?>" alt="">
                                </div>
                            </div>

                    <div class="control">
                      <button class="button is-link">Обновить</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
     