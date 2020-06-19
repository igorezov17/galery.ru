<?php

use app\assets\AppAsset;
use yii\helpers\Html;  // хелпер будет помогать генерировать ссылки
use yii\web\Controller;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title> 
    <?php // потом вставим "<?= $this->title ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="wrap">
        <div class="container">
            <nav class="nav nav-pills nav-justified">
                <a class="nav-link active"> <?= Html::a('Главная', ['site/index']) ?></a>
                <a class="nav-link active" ><?= Html::a('Статьи', ['sam/dexter']) ?></a>
                <a class="nav-link" ><?= Html::a('Статья', ['sam/school'])?></a>
            </nav>
            
        <?= $content ?>
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>