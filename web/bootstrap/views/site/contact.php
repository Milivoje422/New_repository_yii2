<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - '.Yii::t('strings','Contact');
$this->metaDescription = Yii::t('strings','Contact Us') .'! ' . Yii::t('strings','If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.');
$this->breadcrumbs=array(
	Yii::t('strings','Contact'),
);
?>

<h1><?php echo Yii::t('strings','Contact Us'); ?></h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('contact'),
    )); ?>

<?php else: ?>
<p>
<i class="icon-large icon-home"></i> 1 Krajiškog korpusa 58, Banja Luka<br/>
<i class="icon-large icon-bell"></i> +387 66 00 11 22<br/>
<i class="icon-large icon-envelope"></i> <a href="mailto:info@zipaphoto.net" >info@zipaphoto.net</a><br/> 
<i class="icon-large icon-envelope"></i> <a href="mailto:zipaphoto@gmail.com">zipaphoto@gmail.com</a>
</p>
<br/>
<p>
<?php echo Yii::t('strings','If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.'); ?>
</p>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'contact-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo Yii::t('strings','Fields with {star} are required.',array('{star}'=>"<span style='color:red'>*</span>")); ?></p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'name'); ?>

    <?php echo $form->textFieldRow($model,'email'); ?>

    <?php echo $form->textFieldRow($model,'subject',array('size'=>60,'maxlength'=>128)); ?>

    <?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'class'=>'span8')); ?>

	<?php if(CCaptcha::checkRequirements()): ?>
		<?php echo $form->captchaRow($model,'verifyCode',array(
            'hint'=>'Please enter the letters as they are shown in the image above.<br/>Letters are not case-sensitive.',
        )); ?>
	<?php endif; ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>Yii::t('strings','Submit'),
        )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>