
<?php 


use yii\helpers\Html;
use yii\helpers\Url;

?>

<h1>Пользователи</h1>
<div class="box-body">
<a href="/admin/users/edit"  class="btn btn-success btn-lg" left="100">
<i class="fa fa-pencil"></i>
Create
</a>
</div>
<table class="table table-condensed">
    <th>Name</th>
    <th>Email</th>
    <th>image</th>
    <th>Действия</th>
    <?php
            // echo "<pre>";
            // var_dump($users);
            // echo "</pre>";
            // die;
    ?>
        <?php $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id); ?>

        <?php
        $role;
        foreach ($roles as $rol)
        {
            $role = $rol;
        }            
        ?>  
    <?php foreach($users as $user): ?>
    <div class="col-md-10">
        <tr>
            <th><?= $user['username']; ?></th>
            <th><?= $user['email']; ?></th>
            <th><img src="<?= "/uploads/" . $user['image']; ?>" alt="" width="200"></th>
            <td>

        <?php

        ?>

            <?php if ($role->name == 'ban') { ?>
            
                <a href="photos/<?php echo $user['id']; ?>/edit" class="btn btn-warning">
                <i class="fa fa-pencil"></i>
                Ban
                </a>
            <?php } elseif ($role->name == 'content') { ?>
                <a href="photos/<?php echo $user['id']; ?>/edit" class="btn btn-primary">
                <i class="fa fa-pencil"></i>
                Content
                </a>
            <?php } elseif ($role->name == 'admin') { ?>
                <a href="photos/<?php echo $user['id']; ?>/edit" class="btn btn-dark">
                <i class="fa fa-pencil"></i>
                Admin
                </a>
            <?php } else { ?>
                <a href="photos/<?php echo $user['id']; ?>/edit" class="btn btn-success">
                <i class="fa fa-pencil"></i>
                Active
                </a>
            <?php } ?>
                <!-- <a href="photos/<?php //echo $user['id']; ?>/edit" class="btn btn-info">
                <i class="fa fa-pencil"></i>
                Update
                </a> -->
               
                <a href="/admin/users/delete/<?php echo $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
                
                <i class="fa fa-remove"></i>
                Delete
                </a>
            </td>
        </tr>

    </div>
<?php endforeach; ?>

</table>