<?php
/**
 * Created by PhpStorm.
 * User: Windows10
 * Date: 18.01.2017.
 * Time: 17:31
 */
use kartik\widgets\DateTimePicker;
use yii\helpers\Html;
?>

<?= $form->field($model, 'img_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'head_title')->textInput(['maxlenght' => true])?>

<?= $form->field($model, 'img_description')->textarea(['maxlength' => true, 'rows'=> 6]) ?>

<?= $form->field($model, 'image_status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', 'DELETED' => 'DELETED','BANNED'=>'BANNED' ]) ?>

<?= $form->field($model, 'image_group')->dropDownList([ 'SINGLE' => 'SINGLE', 'PHOTO_STORY' => 'PHOTO_STORY', 'PHOTO_EVENT_STORY' => 'PHOTO_EVENT_STORY']) ?>

<?= $form->field($model, 'img_taken_timedate')->widget(
	DateTimePicker::className(), [
	'name' => '',
	'type' => DateTimePicker::TYPE_INPUT,
	'value' => '',
	'pluginOptions' => [
		'autoclose'=>true,
		'format' => 'yyyy-m-d H:i:s'
	]
]); ?>
<?= $form->field($model, 'file')->fileInput() ?>


<div class="form-group">
	<div class="<?= $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' ?> next-button-story" style="display:none"><?= Yii::t('app', 'Next') ?></div>
	<div class="<?= $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' ?> next-button-gallery" style="display:none"><?= Yii::t('app', 'Next') ?></div>
</div>

<div class="form-group">
	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success done-btn' : 'btn btn-primary done-btn']) ?>
</div>


