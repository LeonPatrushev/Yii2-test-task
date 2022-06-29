<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\data\ActiveDataProvider;
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

    public function actionAdd()
    {
        $model = new Users();

        if($model->load(Yii::$app->request->post())){
            $model->imageFile = UploadedFile::getInstance($model,'imageFile');
            $model->upload();
            $model->save();
            return $this->redirect(['users/index']);
        }
        return $this->renderAjax('add',[
            'model' => $model
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
        return $this->renderAjax('edit',[
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $model = Users::findOne($id);
        if($model)
        {
            $model->delete();
        }
        return $this->redirect(['users/index']);
    }
}