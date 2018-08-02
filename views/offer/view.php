<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Offer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'offer_id',
            'offer_available',
            'url:url',
            'price',
            'optprice',
            'category_id',
            'picture',
            'name',
            'articul',
            'vendor',
            'description',
            'status_new',
            'status_action',
            'status_top',
        ],
    ]) ?>

</div>
