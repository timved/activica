<?php
/**
 * Created by PhpStorm.
 * User: timozavr
 * Date: 01.08.18
 * Time: 22:22
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'xml', 'wrongExtension' => 'Допустимый формат файла: xml'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'Загрузить файл',
        ];
    }

    public function showFile()
    {

        $model->file = UploadedFile::getInstance($model,'file');
        $fileName = $model->file->getBaseName() . "." . $model->file->getExtension();
        $filePath = "@webroot/uploads/" . $fileName;
        $model->file->saveAs(\Yii::getAlias($filePath));
//        $xml = simplexml_load_file(\Yii::getAlias($filePath));
//        print_r($xml);
//        $upload = UploadedFile::getInstance($model, 'file');
//        $fileName = $this->file->getBaseName() . "." . $this->file->getExtension();
//        $filePath = "@webroot/uploads/" . $fileName;
//        $this->file->saveAs(\Yii::getAlias($filePath));
//        $xml = simplexml_load_file($upload);
//        var_dump($xml);
    }

}