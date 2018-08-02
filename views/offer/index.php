<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\SearchOffer */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'offer_id',
            'offer_available',
            'url:url',
            'price',

            'optprice',
//            'category_id',
            'picture',
            'name',
            'articul',
            'vendor',
            'description',
//            'status_new',
//            'status_action',
//            'status_top',

            ['class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'delete' => false,
                    'update' => false,
                ],

            ],
        ],
    ]); ?>
</div>
