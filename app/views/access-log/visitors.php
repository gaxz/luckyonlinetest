<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccessLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Online Visitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-log-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <div style="padding: 20px; text-align: center; background-color: #c6edc6;">
        <?php if (!empty($visitorsCount)) : ?>
            Online visitors between <b><?= $searchModel->dateFrom ?></b>
            and <b><?= $searchModel->dateTo ?></b>:
            <b><?= $visitorsCount ?></b>
        <?php else : ?>
            Select interval
        <?php endif; ?>
    </div>
</div>