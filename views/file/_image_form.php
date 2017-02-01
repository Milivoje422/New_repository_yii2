<?php

use yii\widgets\ActiveForm;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Images */
/* @var $form yii\widgets\ActiveForm */


?>



<div class="images-form">

	<?php $form = ActiveForm::begin([
			'id' => $model->formName(),
//			'beforeSubmit' => true,
//			'enableAjaxValidation' => true,

	]);

	$script = <<< JS
	$('#images-image_group').on('change', function(){
		console.log($(this).val());
		if($(this).val() == "SINGLE"){
			$('._gallery').hide();
			$('._events').hide();
			$('.next-button-gallery').hide();
			$('.next-button-story').hide();
			$('.done-btn').show();

		}else if($(this).val() == "PHOTO_STORY"){
			$('._gallery').show();
			$('._events').hide();
			$('.next-button-gallery').show();
			$('.next-button-story').hide();
			$('.done-btn').hide();


		}else if($(this).val() == "PHOTO_EVENT_STORY"){
			$('._events').show();
			$('._gallery').hide();
			$('.next-button-story').show();
			$('.next-button-gallery').hide();
			$('.done-btn').hide();
		}
	});

	$('.next-button-gallery').on('click', function(){
		console.log($(this).text());
		$('#w1-tab0').removeClass('active in');
		$('#gallery_images').addClass('fade active in');
		$('._main').removeClass('active');
		$('._gallery').addClass('active');
	});
	$('.next-button-story').on('click', function(){
		console.log($(this).text());
		$('#w1-tab0').removeClass('active in');
		$('#image_events').addClass('fade active in');
		$('._main').removeClass('active');
		$('._events').addClass('active');
	});

	//$('.next-button-gallery').on('click', function(){
	//	var formData = $('#Images');
	//	$.post(
	//	formData.attr('action').
	//	formData.serialize(),
	//	function(data){
	//		console.log(data);
	//	});
    //
	//});

//$('body').on('beforeSubmit', '#Images', function () {
//     var form = $(this);
//     // return false if form still have some validation errors
//     if (form.find('.has-error').length) {
//          return false;
//     }
//     // submit form
//     $.ajax({
//          url: '..' + form.attr('action'),
//          type: 'post',
//          data: form.serialize(),
//          success: function (response) {
//               // do something with response
//               console.log(response);
//          }
//     });
//     return false;
//});


JS;
	$this->registerJs($script);

	?>

	<?= TabsX::widget([
		'position' => TabsX::POS_ABOVE,
		'align' => TabsX::ALIGN_LEFT,
		'items' => [
			[
				'label' => Yii::t('app','Main'),
				'content' => $this->render('_main', ['model' => $model, 'form' => $form]),
				'active' => true,
				'headerOptions' => ['class'=>'_main'],
			],
			[
				'label' => Yii::t('app','Image gallery'),
				'content' => $this->render('_gallery'),
				'options' => ['id' => 'gallery_images'],
				'headerOptions' => ['class'=>'_gallery'],
			],
			[
				'label' => Yii::t('app','Image events'),
				'content' => $this->render('_events'),
				'options' => ['id' => 'image_events'],
				'headerOptions' => ['class'=>'_events' ,'style'=> 'display:none'],
			],
		],

	]);
	?>

	<?php ActiveForm::end(); ?>


</div>
