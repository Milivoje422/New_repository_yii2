<?php
/**
 * Created by PhpStorm.
 * User: Jarvis
 * Date: 3/2/2017
 * Time: 3:44 PM
 */
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Images */

//$this->title = Yii::t('app', 'Create Banners');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Banners'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="images-create">
		<h1><?= Html::encode($this->title) ?></h1>
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>

	</div>

<?php