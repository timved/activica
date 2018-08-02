<?php
/**
 * Created by PhpStorm.
 * User: timozavr
 * Date: 01.08.18
 * Time: 22:22
 */

namespace app\models;


use yii\base\Model;
use app\models\tables\Offer;

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
        $fileName = $this->file->getBaseName() . "." . $this->file->getExtension();
        $filePath = "@webroot/uploads/" . $fileName;
        $this->file->saveAs(\Yii::getAlias($filePath));
        $xml = simplexml_load_file(\Yii::getAlias($filePath));

        foreach ($xml->shop->offers->offer as $item) {

            $offer = new Offer();

            $offer->offer_id = (int)$item['id'];
            $offer->offer_available = (string)$item['available'];
            $offer->url = (string)$item->url;
            $offer->price = (float)($item->price);

            $offer->optprice = (float)$item->optprice;
            $offer->category_id = (int)$item->categoryId;
            $offer->picture = (string)$item->picture;
            $offer->name = (string)$item->name;
            $offer->articul = (string)$item->articul;
            $offer->vendor = (string)$item->vendor;

            $offer->description = (string)$item->extprops->name . "\n" . (string)$item->extprops->season;

            $offer->status_new = (string)$item->statusNew;
            $offer->status_action = (string)$item->statusAction;
            $offer->status_top = (string)$item->statusTop;

            $offer->save();
        }

    }

}