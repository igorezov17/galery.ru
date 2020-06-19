<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\web\Controller;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="wrap">
        <div class="container"> 

            <nav class="nav nav-pills nav-justified">
                <a class="nav-link active"> <?= Html::a('Главная', ['site/index']) ?></a>
                <a class="nav-link active" ><?= Html::a('Статьи', ['post/index']) ?></a>
                <a class="nav-link" ><?= Html::a('Статья', ['post/show'])?></a>
                <a class="nav-link" ><?= Html::a('Пользователь', ['post/della'])?></a>
            </nav>
            <?php if(isset ($this->blocks['block1'])) :?>
                <?php echo $this->blocks['block1'] ?>
            <?php endif; ?>
            <?= $content ?>
 
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>