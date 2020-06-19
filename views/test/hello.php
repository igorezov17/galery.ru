<h1><?= $rezult; ?></h1>
<div>
    <ul>
        <?php foreach($array as $item): ?>
            <li><?php echo $item->username; ?></li>
        <?php endforeach; ?>
    </ul>
</div>