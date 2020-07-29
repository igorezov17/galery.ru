<h1>Это read</h1>


<?php foreach($images as $image): ?>
<table class="table table-condenseds">
<div class="col-md-10">
<tr>
    <td>
    <h3><?php var_dump($image['title']) ?></h3>
    </td>
</tr>
</div>

<?php endforeach; ?>
</table>