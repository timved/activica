<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property int $id
 * @property int $offer_id
 * @property string $offer_available
 * @property string $url
 * @property double $price
 * @property double $optprice
 * @property int $category_id
 * @property string $picture
 * @property string $name
 * @property string $articul
 * @property string $vendor
 * @property string $description
 * @property string $status_new
 * @property string $status_action
 * @property string $status_top
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offer_id', 'category_id'], 'integer'],
            [['price', 'optprice'], 'number'],
            [['offer_available', 'url', 'picture', 'name', 'articul', 'vendor', 'description', 'status_new', 'status_action', 'status_top'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'offer_id' => 'Offer ID',
            'offer_available' => 'Offer Available',
            'url' => 'Url',
            'price' => 'Price',
            'optprice' => 'Optprice',
            'category_id' => 'Category ID',
            'picture' => 'Picture',
            'name' => 'Name',
            'articul' => 'Articul',
            'vendor' => 'Vendor',
            'description' => 'Description',
            'status_new' => 'Status New',
            'status_action' => 'Status Action',
            'status_top' => 'Status Top',
        ];
    }
}
