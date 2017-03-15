<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
	echo "<h2>";
	echo Yii::t('app', 'Banners');
	echo "</h2>";
?>
<div class="images-index">
	<p>
		<?= Html::a(Yii::t('app', 'Create Banner'), ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],
			'banner_name',
			'banner_status',
			'banner_position',
			'date_start',
			'date_ends',
			array(
				'label' => 'Image',
				'format' => 'html',
				'value' => function($model){
					$url = $model->getBannerUrl();
					return Html::img($url, ['alt'=>'yii','width'=>'150 ','height'=>'60']);
				}
			),
			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>