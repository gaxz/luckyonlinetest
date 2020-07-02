<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccessLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="access-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['visitors'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dateFrom')->widget(kartik\datetime\DateTimePicker::class, [
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ]
    ])->label('Date from:') ?>

    <?= $form->field($model, 'dateTo')->widget(kartik\datetime\DateTimePicker::class, [
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ]
    ])->label('Date To:') ?>

    <div class="form-group" style="text-align: center">
        <?= Html::submitButton('Count', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>