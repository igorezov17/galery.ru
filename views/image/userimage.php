<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>
      <section class="hero is-primary">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              Моя галерея
            </h1>
            <h2 class="subtitle">
              Загруженные вами картинки
            </h2>
          </div>
        </div>
      </section>
      <section class="section main-content">
        <div class="container">
          <div class="columns  is-multiline">
            <?php foreach($images as $image): ?>

            <div class="column is-one-quarter">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <a href="/image/view/<?php echo $image['id'] ?>">
                      <img src="/uploads/<?php echo $image['image']; ?>" alt="Placeholder image">
                    </a>
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media my-photo">
                    <div class="media-left">
                      <p class="title is-5">

                        <a href="<?= Url::toRoute(['image/ratota', 'id'=>$image['id']]); ?>" class="button is-warning">
                          <i class="fa fa-edit">Ratota</i>
                        </a>
                        <a href="/image/delete/<?php echo $image['id']; ?> " class="button is-danger">
                          <i class="fa fa-times">Delete</i>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
