<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppImage;

AppImage::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
  
    <div class="wrapper">
      <div class="container">
        <nav class="navbar is-transparent">
          <div class="navbar-brand">
            <a class="navbar-item" href="/image">
              <img src="/uploads/bulma-logo.png" width="112" height="28">
            </a>
            <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>

          <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start">
              <a class="navbar-item" href="/image/index">
                Главная
              </a>

              <a class="navbar-item" href="/news/index">
                Новости
              </a>              
              </div>
            </div>
            <?php if (!(Yii::$app->user->isGuest)) { ?>
              <div class="dropdown is-hoverable">
              <div class="navbar-end">
              <div class="navbar-item">
                <div class="field is-grouped">
                                <div class="dropdown-trigger">
                                    <button class="button is-primary" aria-haspopup="true" aria-controls="dropdown-menu4">
                                        <span>Управление</span>
                                        <span class="icon is-small">
                                            <i class="fas fa-angle-down" aria-hidden="true"></i>
                                          </span>
                                    </button>
                                </div>
                                </div>
                              </div>
                              </div>
                                <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                                    <div class="dropdown-content">
                                        <div class="dropdown-item manager-links">
                                            <p class="control">
                                                <a class="button" href="/image/create">
                                                      <span class="icon">
                                                        <i class="fas fa-upload"></i>
                                                      </span>
                                                    <span>Загрузить картинку</span>
                                                </a>
                                            </p>

                                            <p class="control">
                                                <a class="button" href="/image/user-image/<?php echo Yii::$app->user->id; ?>">
                                                      <!-- <span class="icon">
                                                        <i class="fas fa-image"></i>
                                                      </span> -->
                                                    <span>Моя галерея</span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account control">
                                <p>
                                     Здравствуйте, <b><?= Yii::$app->user->identity->username;?></b>
                                     
                                </p>
                            </div>
                            <div class="navbar-end">
                            <div class="navbar-item">
                            <div class="field is-grouped">
                            <p class="control">
                                <a class="button is-info" href="/user/profile">
                                  <!-- <span class="icon">
                                    <i class="fas fa-user"></i>

                                  </span> -->
                                    <span>Профиль</span>
                                </a>
                            </p>
                            <p class="control">
                                <a class="button is-dark" href="/user/logout">
                                  <span class="icon">
                                    <i class="fas fa-window-close"></i>
                                  </span>
                                    <span>Выйти</span>
                                </a>
                            </p>
                            </div>
                            </div>
                            </div>
              <?php } else { ?>
            <div class="navbar-end">
              <div class="navbar-item">
                <div class="field is-grouped">
                  <p class="control">
                    <a class="button is-link" href="/login/login-up">
                      <span class="icon">
                        <i class="fas fa-user"></i>
                      </span>
                      <span>Войти</span>
                    </a>
                  </p>
                  <p class="control">
                    <a class="button is-primary" href="/register/sign-up">
                      <span class="icon">
                        <i class="fas fa-address-book"></i>
                      </span>
                      <span>Зарегистрироваться</span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
              <?php }; ?>
          </div>
        </nav>
      </div>
      <?= $content ?>
      <footer class="section hero is-light">
          <div class="container">
            <div class="content has-text-centered">
              <!-- <div class="tabs">
                <ul>
                  <li class="is-active"><a>Главная</a></li>
                  <li><a>Природа</a></li>
                  <li><a>Дизайн и Интерьер</a></li>
                  <li><a>Животные</a></li>
                  <li><a>Природа</a></li>
                  <li><a>Дизайн и Интерьер</a></li>
                  <li><a>Животные</a></li>
                  <li><a>Природа</a></li>
                  <li><a>Дизайн и Интерьер</a></li>
                  <li><a>Животные</a></li>
                </ul>
              </div> -->
              <p>
                <strong>Marlin</strong> - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit expedita consequatur, et. Unde, nulla, dicta.
              </p>
              <p class="is-size-7">
                All rights reserved. 2018
              </p>
            </div>
          </div>
      </footer>
      <?php $this->endBody() ?>

    </div>
  </body>

  <script>
    document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
  </script>
</html>

<?php $this->endPage() ?>
