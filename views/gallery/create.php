<?php
use yii\widgets\ActiveForm;
use aquy\gallery\GalleryManager;
?>


<?php $form = ActiveForm::begin([ 'id' => $model->formName() ]); ?>


<?php
if ($model->isNewRecord) {
	echo 'Can not upload images for new record';
} else {
	echo GalleryManager::widget(
		[
			'model' => $model,
			'behaviorName' => 'galleryBehavior',
			'apiRoute' => 'product/galleryApi'
		]
	);
}

?>


<?php ActiveForm::end(); ?>
