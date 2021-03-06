<?php

use yii\helpers\Html;
?>

<h1>Все изображения</h1>
<div class="box-body">
<a href="/admin/posts/edit/"  class="btn btn-success btn-lg" >
<i class="fa fa-pencil"></i>
Create
</a>
</div>

<table class="table table-condensed">
    <th>Tiltle</th>
    <th>Description</th>
    <th>Image</th>
    <th>Action</th>


    <?php foreach($posts as $post):

        ?>
    <tr>
        <td><?=  Html::encode($post->title); ?></td>
        <td><?=  Html::encode($post->description); ?></td>
        <td><img src="<?= "/uploads/" . $post->image; ?>" alt="" width="200"></td>
        <td>
            <a href="/admin/posts/update/<?php echo $post->id; ?>" class="btn btn-warning">
            <i class="fa fa-pencil"></i>
            Update
            </a>
            <a href="/admin/posts/delete/<?php echo $post['id']; ?>" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
            <i class="fa fa-remove"></i>
            Delete
            </a>
        </td>
    </tr>
<?php endforeach; ?>
</table>