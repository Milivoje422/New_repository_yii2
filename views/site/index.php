<?php
/* @var $this yii\web\View */
use pendalf89\filemanager\widgets\FileInput;
use pendalf89\scroll\ScrollToTop;





//
	echo "<pre>";
//		var_dump($model);
	echo "</pre>";
//
//	foreach($model as $key => $image)
//	{
//
//	}

	?>


	<?php 

//function getIP()
//{
//	return CHttpRequest::getUserHostAddress();
//}
//echo getIP();

//print_r(Yii::$app->request->userIP);
echo "<pre>";
print_r(Yii::$app->user->id);
?>


<?= ScrollToTop::widget(['label' => 'UP']) ?>