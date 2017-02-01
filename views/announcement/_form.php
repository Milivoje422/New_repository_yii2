<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Announcement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="announcement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'announcement_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'announcement_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'announcement_status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', 'AUTO' => 'AUTO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'announcement_auto_active_from')->textInput() ?>

    <?= $form->field($model, 'announcement_auto_active_to')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
