<?php 
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<section class="hero is-primary">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              Природа
            </h1>
            <h2 class="subtitle">
              Картинки по категориям
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
                    <a href="<?= Url::toRoute(['image/view', 'id'=>$image['id']]); ?>">
                      <img src="<?php echo '/uploads/' . $image['image'] ?>" alt="Placeholder image">
                    </a>
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-left">
                    <p class="title is-5"><a href="category.html">Природа</a></p>
                    </div>
                    <div class="media-right">
                      <p  class="is-size-7">Размер: 1280x760</p>
                      <time datetime="2016-1-1" class="is-size-7">Добавлено: <?php echo $image->date; ?></time>
                    </div>
                  </div>
                </div>
             
              </div>
            </div>
            <?php endforeach; ?>
      </section>

