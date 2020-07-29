<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>

<h1>Картники</h1>
<a href="<?php echo Url::to(['employ/create-foto']) ?>" class="btn btn-success">Create new</a>
<br>
<table class="table table-condensed">
<tr>
        <th>ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Date</th>
        <th>Author</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
<?php foreach( $result as $img): ?>

<div class="col-md-10">
    <tr>
        <td><?php echo $img->id; ?></td>
        <td><?php echo $img->title; ?></td>
        <td><?php echo $img->getImage(); ?></td>
        <td><?php echo $img->getDate(); ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><a href="<?php echo Url::to(['employ/update-foto', 'id' => $img->id])?>" class="btn btn-primary">Edit</td>

    </tr>
</div>

<?php endforeach; ?>
</table>