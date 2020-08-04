<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

      <section class="hero is-info is-medium">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              Как мы путешествовали!
            </h1>
            <h2 class="subtitle">
              Это был наш первый день у океана. Потрясающий снимок. Самый лучший момент в моей жизни.
            </h2>
          </div>
        </div>
      </section>


      <div class="container main-content">
        <div class="columns">
          <div class="column"></div>
          <div class="column is-half auth-form">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="<?php echo "/uploads/" . $image->image ?>" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-left">
                    <figure class="image is-48x48">
                      <img src="<?php echo "/uploads/" . $image->image ?>" alt="Placeholder image">
                    </figure>
                  </div>
                    <p class="title is-4">
                      Добавил: <a href="#">marlin</a>
                    </p>
                </div>

                <div class="content">
                  Это был наш первый день у океана. Потрясающий снимок. Самый лучший момент в моей жизни.
                  <br>
                  <time datetime="2016-1-1" class="is-size-6 is-pulled-left">Добавлено: 12.02.2018</time>
                  <a href="#" class="button is-info is-pulled-right">Скачать</a>
                  <div class="is-clearfix"></div>
                </div>
              </div>
            </div>
           
          </div>
          <div class="column"></div>
        </div>
        
        <hr>

        <div class="columns">
          <div class="column">
            <h1 class="title">Другие фотографии от <a><?php echo $userimage[0]['username']; ?></a></h1>
          </div>
        </div>

        <div class="columns section">

          <?php foreach($userimage as $img): ?>
          <div class="column is-one-quarter">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    
                  <a href="<?= Url::toRoute(['image/view', 'id'=>$img['id']]); ?>">
                      <img src="<?php echo "/uploads/" . $img['img'] ?>" alt="Placeholder image">
                    </a>
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-left">
                  
                    <p class="title is-5"><a href="#"><?php echo $img['categname']; ?></a></p>
                    </div>
                    <div class="media-right">
                      <p  class="is-size-7">Размер: 1280x760</p>
                      <time datetime="2016-1-1" class="is-size-7">Добавлено: <?php echo $img['date']; ?></time>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          <?php endforeach; ?>

          

        </div>
      </div>
