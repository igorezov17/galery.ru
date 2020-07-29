<?php

use yii\helpers\Html;
?>

<h1>Все изображения</h1>
<div class="box-body">
<a href="admin/users/edit"  class="btn btn-success btn-lg" >
<i class="fa fa-pencil"></i>
Create
</a>
</div>

<table class="table table-condensed">
    <th>Tiltle</th>
    <th>Description</th>
    <th>Image</th>
    <th>Action</th>
    <?php foreach($images as $image): ?>
    <tr>
        <td><?= $image->title; ?></td>
        <td><?= $image->description; ?></td>
        <td><img src="<?= "/uploads/" . $image->image; ?>" alt="" width="200"></td>
        <td>
            <a href="photos/<?php echo $user['id']; ?>/edit" class="btn btn-warning">
            <i class="fa fa-pencil"></i>
            Update
            </a>
            <a href="photos/<?php echo $user['id']; ?>/delete" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
            <i class="fa fa-remove"></i>
            Delete
            </a>
        </td>
    </tr>
<?php endforeach; ?>
</table>