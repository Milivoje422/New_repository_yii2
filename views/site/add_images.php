<?php
/**
 * Created by PhpStorm.
 * User: Windows10
 * Date: 12.01.2017.
 * Time: 18:25
 */



use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Image */

$this->title = Yii::t('app', 'Create Image');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-create">
	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('upload_img_form', [
		'model' => $model,
	]) ?>
</div>
