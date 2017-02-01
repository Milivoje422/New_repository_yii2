<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Dropdown;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Category;
use app\models\Profile;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <?= Html::csrfMetaTags() ?>
        <title><?= Yii::$app->id; ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
<div class="window">
	<div class="header_navbar">
		<div class="navbar_top">
			<ul class="left_side_navbar_top">
				<?php if (Yii::$app->user->isGuest) {
					echo '<li><a href="'.Yii::$app->request->baseUrl.'/user/security/login">'.Yii::t("app","Login").'</a></li>';
				}else{
					echo Html::beginForm(['/user/logout'], 'post');
					echo Html::submitButton(Yii::t('app','Logout')."(".Yii::$app->user->identity->username.")");
					echo Html::endForm();
				} ?>
			</ul>
			<ul class="right_side_navbar_top">
				<?php
				foreach(Yii::$app->params['languages'] as $key => $language) {
					echo '<li id="'.$key.'">'. $language['language'] .'</li>';
				}
				?>
			</ul>
		</div>
		<div class="navbar_middle">
			<div class="site_logo">
				<img src="asdfa">
			</div>
			<div class="main_search_space">
				<input type="text">
			</div>
		</div>
			<div class="navbar_bottom">
				asdfasdf
			</div>
	</div>

	<div id="wrap">
		<div class="container" id="page">
		        <?= $content ?>
		</div>
	</div>
</div>
<div class="footer-banner-wrap"></div>
<div id="footer"></div>

    <?php $this->endBody() ?>
    <script type="text/javascript">

	    function doAjax(data, url){
		    $.ajax({
			    method: "POST",
			    url: url,
			    data: {lang: data},
			    success:function(data){
				    location.reload();
			    }
		    });
	    }
	    $(document).ready(function(){

		    $(".options-main select").msDropDown();

		    $('.language-info img').click(function() {
			    $('.dropdown_selection_languages').fadeToggle(500);
		    });

		    $('.dropdown_selection_languages ul li').click(function(){
			    var lang_small = $(this).attr('id');
			    var url = "<?= Yii::$app->request->BaseUrl; ?>/site/language";
			    doAjax(lang_small, url);
		    });


		    $('.right_side_navbar_top li').on('click', function(){
			    var lang = $(this).attr("id");
			    var url = "<?= Yii::$app->request->BaseUrl; ?>/site/language";
			    doAjax(lang, url);

		    });
	    });

    </script>
</body>
</html>
<?php $this->endPage() ?>
