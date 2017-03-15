<?php
/**
 * Created by PhpStorm.
 * User: Jarvis
 * Date: 3/2/2017
 * Time: 3:46 PM
 */
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin([
	'id' => $model->formName()]);
?>
<div class="col-sm-10">
	<?= $form->field($model, 'banner_name')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-sm-10">
	<?= $form->field($model, 'banner_position')->dropDownList([ 'CENTER' => 'CENTER', 'RIGHT' => 'RIGHT', 'TOP' => 'TOP','FOOTER'=>'FOOTER' ]) ?>
</div>
<div class="col-sm-10">
	<?= $form->field($model, 'banner_status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE' ]) ?>
</div>
<div class="col-sm-10">
	<?= $form->field($model, 'banner_url')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-sm-4">
	<?= $form->field($model, 'date_start')->widget(
		DateTimePicker::className(), [
		'name' => '',
		'type' => DateTimePicker::TYPE_INPUT,
		'value' => '',
		'pluginOptions' => [
			'autoclose'=>true,
			'format' => 'yyyy-m-d H:i:s'
		], 'class' => 'form-control',
	]); ?>
</div>
<div class="col-sm-4">
<?= $form->field($model, 'date_ends')->widget(
	DateTimePicker::className(), [
	'name' => '',
	'type' => DateTimePicker::TYPE_INPUT,
	'value' => '',
	'pluginOptions' => [
		'autoclose'=>true,
		'format' => 'yyyy-m-d H:i:s'
	], 'class' => 'form-control',
]); ?>
</div>
<div class="col-sm-10">
	<?= $form->field($model, 'file')->fileInput() ?>
</div>

<div class="col-sm-10">
	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success done-btn' : 'btn btn-primary done-btn']) ?>
</div>

<?php ActiveForm::end(); ?>