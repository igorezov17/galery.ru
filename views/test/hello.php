<?php
use yii\helpers\Url;
?>

<h1><?= $rezult; ?></h1>

    <ul>
        <?php foreach($array as $item): ?>
            <li><?php echo $item->username; ?></li>
        <?php endforeach; ?>
        
    </ul>
    <p><a class="btn btn-lg btn-success" href="<?php echo Url::to(['test/form-user']); ?>">NewForm</a></p>

</div>