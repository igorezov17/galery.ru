
<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

        <div class="columns">
            <div class="column">
              <div class="tabs is-centered pt-100">
                <ul>
                <li class="is-active">
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
                  <li >
                    <a href="/user/security">
                      <span class="icon is-small"><i class="fas fa-lock"></i></span>
                      <span>Безопасность</span>
                    </a>
                  </li>
                </ul>
              </div>
              <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><h3>Профиль пользователя</h3></div>
                            <div class="card-body">
                                  <div class="media">
                                  <div class="media-body">
                                    
                                    <p><img src="<?php echo "../uploads/" .  Html::encode($users['image']); ?>" class="mr-3" alt="..." width="400" height="400"></p>
                                    <h3 class="mt-0"><?php echo  Html::encode($users['username']);  ?></h3> 
                                    <p>
                                    <?php echo  Html::encode($users['email']); ?>
                                    </p>
                                  </div>
                                </div>
                                </div>
                          </div>
                      </div>
                      </div>
                    </div>
                </div>
              </div>
        </main>
              

      
          </div>
        </div>
      </section>




                  </div>
                </div>
            </div>
        </div>
      </div>
     