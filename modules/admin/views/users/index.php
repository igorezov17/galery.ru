
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

    <div class="col-md-10"></div>
        <tr>
            <th><?=  Html::encode($user['name']); ?></th>
            <th><?=  Html::encode($user['email']); ?></th>
            <th><img src="<?= "/uploads/" .  Html::encode($user['image']); ?>" alt="" width="200"></th>
            <td>

        <?php
            // var_dump($user);

        ?>

            <?php if ($user['role'] == 'banned') { ?>
            
                <a href="/admin/users/change-role/<?php echo $user['id']?>/<?php echo 0; ?>" class="btn btn-danger">
                <i class="fa fa-pencil"></i>
                Ban
                </a>
            <?php } elseif ($user['role'] == 'content') { ?>
                <a href="#" class="btn btn-primary">
                <i class="fa fa-pencil"></i>
                Content
                </a>
            <?php } elseif ($user['role'] == 'admin') { ?>
                <a href="#" class="btn btn-info">
                <i class="fa fa-pencil"></i>
                Admin
                </a>
            <?php } else { ?>
                <a href="/admin/users/change-role/<?php echo $user['id']?>/<?php echo 1; ?>" class="btn btn-success">
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