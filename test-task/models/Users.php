<?php

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    public $imageFile;

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'image' => 'Фото',
            'imageFile' => 'Фото',
            'password' => 'Пароль'
        ];
    }

    public function rules()
    {
        return [
            [['name','password'],'required'],
            [['surname','imageFile'],'safe']
        ];
    }

    public function upload()
    {
        if ($this->imageFile != null)
        {
            $way = 'img/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($way);
            $this->image = '/' . $way;
            return true;
        }
        return false;
    }
}