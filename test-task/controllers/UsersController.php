<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\UploadedFile;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find(),
            'pagination' =>[
                'pageSize' => 5,
            ],
        ]);
        return $this->render('index',[
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Users::findOne($id);
        if($model->load(Yii::$app->request->post())){
            $model->imageFile = UploadedFile::getInstance($model,'imageFile');
            $model->upload();
            $model->save();
            return $this->redirect(['users/index']);
        }
        return $this->render('edit',[
            'model' => $model
        ]);
    }
}