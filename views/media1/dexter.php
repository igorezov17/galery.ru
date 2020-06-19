<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Media(1) Galleri';
$this->params['breadcrumbs'][] =$this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<p>
<?php echo Html::a('Upload File', ['upload'], ['class'=>'btn btn-primary']) ?>
</p>
<div class="row">
    <?php
    foreach ($medias as $media) {
    ?>
    <div class="col-md-3">
        <div class="card" style='height 255px'>
            <img src="<?php echo Yii::getAlias('@web').'/'.$media->filepath; ?>" class="card-img-top" width="100">
            <div class="card-body">
                <h5 class="card-title" style="word-wrap:break-word"><?php echo $media->filename; ?></h5>
                <div class="text-right">
                <?php
                    echo Html::a('Download', ['download', 'id'=>$media->id], ['class'=>'btn btn-primary']);
                    echo "&nbsp";
                    echo Html::a('Delete', ['delete', 'id'=>$media->id], ['class'=>'btn btn-danger']);
                    echo "&nbsp";
                    echo Html::a('Перевернуть', ['ratota', 'id'=>$media->id], ['class'=>'btn btn-primary']);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
