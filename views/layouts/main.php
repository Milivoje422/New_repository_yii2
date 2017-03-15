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
				<li id="sr" class="<?= (\Yii::$app->getRequest()->getCookies()->getValue('lang') == 'sr' ? 'active' : ''); ?>"><img src="<?= Yii::$app->homeUrl ?>../bootstrap/img/langsr.png"/></li>
				<li id="ru" class="<?= (\Yii::$app->getRequest()->getCookies()->getValue('lang') == 'ru' ? 'active' : ''); ?>"><img src="<?= Yii::$app->homeUrl ?>../bootstrap/img/RussiaFlag.png"></li>
				<li id="en" class="<?= (\Yii::$app->getRequest()->getCookies()->getValue('lang') == 'en' ? 'active' : ''); ?>"><img src="<?= Yii::$app->homeUrl ?>../bootstrap/img/langen.png"></li>
				<li id="fr" class="<?= (\Yii::$app->getRequest()->getCookies()->getValue('lang') == 'fr' ? 'active' : ''); ?>"><img src="<?= Yii::$app->homeUrl ?>../bootstrap/img/FranceFlag.png"></li>
				<li id="de" class="<?= (\Yii::$app->getRequest()->getCookies()->getValue('lang') == 'de' ? 'active' : ''); ?>"><img src="<?= Yii::$app->homeUrl ?>../bootstrap/img/images.png"></li>

			</ul>
		</div>
		<div class="navbar_middle">
			<div class="site_logo">
				<img src="<?= Yii::$app->request->BaseUrl; ?>/bootstrap/img/logo-public.png" class="logo-icon"/>
			</div>
<!--			<div class="main_search_space">-->
<!--				<input type="text">-->
<!--			</div>-->
		</div>
		<div class="navbar_bottom">
			<?php
			$cat = Category::find()->all();
			$photo = Profile::find()->where('account_type = 2')->all();

			NavBar::begin([
				'options' => [
					'class' => 'nav',
					'role' => 'navigation',
					'style' => 'padding:0px;'
				],
			]);

			$menuItems = [
				['label' => Yii::t('user','Home'), 'url' => ['/site/index']],
				['label' => Yii::t('user','Gallery'), 'url' => ['/site/gallery']],
				['label' => Yii::t('user','News'), 'url' => ['/site/news']],
				['label' => Yii::t('user','Reports'), 'url' => ['/site/reports']]
			];
			$menuItems[] = "
			<li class='dropdown'>
				<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">".Yii::t('user','Categories')."</a>
					<ul id=\"yw3\" class=\"dropdown-menu\">";
						foreach ($cat as $key => $cat_){ $menuItems[] =  "<li><a tabindex=".$key." href='/site/category/".$cat_['category_id']."'>".$cat_['category_name']."</a></li>"; }
			$menuItems[] ="</ul></li>";

			$menuItems[] = "
			<li class='dropdown'>
				<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">".Yii::t('user','Photographers')."</a>
					<ul id=\"yw3\" class=\"dropdown-menu\">";
						foreach ($photo as $key => $photos){ $menuItems[] =  "<li><a tabindex=".$key." href='/site/photos/".$photos['user_id']."'>".$photos['name']." ".$photos['lastname']."</a></li>"; }
			$menuItems[] ="</ul></li>";

			$menuItems[] = "
			<li class='dropdown'>
				<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">".Yii::t('user','Agency')."</a>
					<ul id=\"yw3\" class=\"dropdown-menu\">";

						foreach (Yii::$app->params['agency'] as $key => $item){
							$menuItems[] =  "<li><a tabindex=".$key." href='".$item['url']."'>".Yii::t('user',$item['menu'])."</a></li>";
						}
						$menuItems[] ="
							<li>".Yii::t('app','Services')."</li>
							<li class='dropdown'>
								<a tabindex='1' href='/site/photography'>".Yii::t('user','Photography')."</a>
								<a tabindex='2' href='/site/cooperation'>".Yii::t('user','Cooperation')."</a>
							</li>
						</ul></li>";


			$menuItems[] = ['label' => Yii::t('user','Contact'), 'url' => ['/site/contact']];
			if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin)
				$menuItems[] = ['label' => Yii::t('user','Admins permissions'), 'url' => ['/user/admin/index']];

			echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-left row nav_style'],
				'items' => $menuItems,
			]);
			NavBar::end();

			?>
			<div class="search_section">
				<button id="modal-" class="btn btn-success info_btn" data-target="#myModal" data-toggle="modal">(3)</button>
				<input type="text" class="form-control main_search">
				<div id="submit" name="search_submit" class="btn btn-success search_btn">Search</div>
			</div>
		</div>
	</div>


	<div id="wrap">
		<div class="container" id="page">
		        <?= $content ?>
		</div>

		<div class="container">
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; ZipaPhoto <?= date('Y') ?></p>
				</div>
			</div>
			<!-- /.row -->
		</footer>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
			    </div>
			    <div class="modal-body">
				    ...
			    </div>
			    <div class="modal-footer">
				    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    <button type="button" class="btn btn-primary">Save changes</button>
			    </div>
		    </div>
	    </div>
    </div>

</body>
</html>
<?php $this->endPage() ?>
