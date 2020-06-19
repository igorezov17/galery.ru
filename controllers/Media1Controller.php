<?php

namespace app\controllers;

use Yii;
use app\models\Media1;
use yii\web\UploadedFile;

class Media1Controller extends \yii\web\Controller
{
    public function actionDexter()
    {
        $data = Media1::find()->all();
        return $this->render('dexter', ['medias'=>$data]);
    }

    public function actionDownload($id)
    {
        $data = Media1::findOne($id);
        header('Content-Type:'.pathinfo($data->filepath, PATHINFO_EXTENSION));
        header('Content-Disposition: filename='.$data->filename);
        return readfile($data->filepath);

    }

    public function actionDelete($id)
    {
        $data = Media1::findOne($id);
        unlink($data->filepath);
        $data->delete();
        return $this->redirect(['dexter']);
    }

    public function actionRatota ($id){  //поверни если сможешь
        $temp = tempnam(sys_get_temp_dir(), 'prefix');

        $data = Media1::findOne($id);

        //define image path
        // $filename="image.jpg";

        var_dump($data->filepath);
        die;
        // Load the image
        $source = imagecreatefromjpeg($data->filepath);

        // Rotate
        $rotate = imagerotate($source, 90, 0);

        //and save it on your server...
        imagejpeg($rotate, $temp);
        // var_dump($data);exit();
        unlink($data->filepath);
        $data->filepath = 'uploads/'.md5_file($temp). '.' .$data->extension;
        rename($temp, $data->filepath); // системный вызов из ниоткуда в никуда

        $data->save();
        return $this->redirect(['dexter']);
    }

    public function actionUpload()
    {
        $model = new Media1();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                $names = UploadedFile::getInstances($model, 'filename');
                foreach ($names as $name){
                    $path = 'uploads/'.md5($name->baseName). '.' .$name->extension;
                    if ($name->saveAs($path)){
                        $filename = $name->baseName . '.' .$name->extension;
                        $filepath = $path;
                        Yii::$app->db->createCommand()->insert('media1',['filename'=>$filename, 'filepath'=>$filepath])->execute();
                    }
                
                }
                return $this->redirect(['dexter']);
            }
        }

        return $this->render('upload', [
            'model' => $model,
        ]);
    }


}
