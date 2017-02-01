<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\announcementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="announcement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'announcement_id') ?>

    <?= $form->field($model, 'announcement_title') ?>

    <?= $form->field($model, 'announcement_content') ?>

    <?= $form->field($model, 'announcement_status') ?>

    <?= $form->field($model, 'announcement_auto_active_from') ?>

    <?php // echo $form->field($model, 'announcement_auto_active_to') ?>

    <?php // echo $form->field($model, 'announcement_start_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
