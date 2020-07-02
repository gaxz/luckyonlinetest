<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccessLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Access Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-log-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('View visitors', ['visitors'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'created_at',
            'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>