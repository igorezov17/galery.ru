
<?php 

use yii\helpers\Html;

?>

<h1>Пользователи</h1>
<div class="box-body">
<a href="admin/users/edit"  class="btn btn-success btn-lg" left="100">
<i class="fa fa-pencil"></i>
Create
</a>
</div>
<table class="table table-condensed">
    <th>Name</th>
    <th>Email</th>
    <th>image</th>
    <th>Действия</th>
<?php foreach($users as $user): ?>
    <div class="col-md-10">
        <tr>
            <th><?= $user->username; ?></th>
            <th><?= $user->email; ?></th>
            <th><img src="<?= "/uploads/" . $user->image; ?>" alt="" width="200"></th>

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

    </div>
<?php endforeach; ?>

</table>