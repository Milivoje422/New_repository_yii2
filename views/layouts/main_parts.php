<div class="navbar-custom">
	<div class="language-info">
		<?php
		switch (\Yii::$app->getRequest()->getCookies()->getValue('lang')) {
			case "sr":
				echo '<img src="'.Yii::$app->request->BaseUrl.'/bootstrap/img/langsr.png"/>';
				break;
			case "ru":
				echo '<img src="'.Yii::$app->request->BaseUrl.'/bootstrap/img/RussiaFlag.png"/>';
				break;
			case "fr":
				echo '<img src="'.Yii::$app->request->BaseUrl.'/bootstrap/img/FranceFlag.png"/>';
				break;
			case "en":
				echo '<img src="'.Yii::$app->request->BaseUrl.'/bootstrap/img/langen.png"/>';
				break;
		}
		?>
		<div class="dropdown_selection_languages">
			<ul>
				<?php
				foreach(Yii::$app->params['languages'] as $key => $language) {
					echo '<li id="'.$key.'">'. $language['language'] .'</li>';
				}
				?>
			</ul>
		</div>
	</div>
	<div class="container" style="float:none; margin:auto; ">
		<div class="row">
			<div class="nav-up-staff">
				<div class="logo-main" style="width:65%; float:left;">
					<img src="<?= Yii::$app->request->BaseUrl; ?>/bootstrap/img/logo-public.png" style="width:80%;" class="logo-icon"/>
					<img src="<?= Yii::$app->request->BaseUrl; ?>/bootstrap/img/logo-public-small.png" style="width:100%;" class="logo-icon-small"/>
				</div>
				<div class="options-main" style="width:35%; float:left; margin-top:15px;">
					<?php if (Yii::$app->user->isGuest) {
						echo '<div class="languages_box">';
						foreach(Yii::$app->params['languages'] as $key => $language) {
							echo "<div class='language_flag'>";
							echo '<img src="'.Yii::$app->request->BaseUrl.$language["flag"].'" id="'.$key.'" >';
							echo "</div>";
						}
						echo '</div>';

						echo '<a href = "../user/security/login" style = "float: right; margin-left:15px;" class="btn btn-primary btn-small" ><i class="icon-white icon-user" ></i>'.Yii::t("app","Login").'</a>';
					}else{

						echo '<div class="languages_box">';
						foreach(Yii::$app->params['languages'] as $key => $language) {
							echo "<div class='language_flag'>";
							echo '<img src="'.Yii::$app->request->BaseUrl.$language["flag"].'" id="'.$key.'" >';
							echo "</div>";
						}
						echo '</div>';

						echo "<div style='display: flex; float: right;'>";
						echo '<div class="card-icon0wrapper">';
						echo '<a href="/site/card" class="btn btn-info btn-small">
								<i class="icon-white icon-shopping-cart"></i></a>';
						echo '</div>';

						echo "<div class='logout_box'>";
						echo Html::beginForm(['/user/logout'], 'post');
						echo Html::submitButton(Yii::t('app','Logout')."(".Yii::$app->user->identity->username.")",['class' => 'logout_submit']);
						echo Html::endForm();
						echo "</div></div>";
					}	?>
				</div>
			</div>
			<div class="navbar nav-bar-menu row" style="padding:0px;     margin-bottom: -30px;">
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

				foreach ($cat as $key => $cat_){
					$menuItems[] =  "<li><a tabindex=".$key." href='/site/category/".$cat_['category_id']."'>".$cat_['category_name']."</a></li>";
				}


				$menuItems[] ="</ul>
	</li>";

				$menuItems[] = "
	<li class='dropdown'>
		<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">".Yii::t('user','Photographers')."</a>
			<ul id=\"yw3\" class=\"dropdown-menu\">";

				foreach ($photo as $key => $photos){
					$menuItems[] =  "<li><a tabindex=".$key." href='/site/photos/".$photos['user_id']."'>".$photos['name']." ".$photos['lastname']."</a></li>";
				}
				$menuItems[] ="</ul>
	</li>";

				$menuItems[] = "
	<li class='dropdown'>
		<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">".Yii::t('user','Service')."</a>
			<ul id=\"yw3\" class=\"dropdown-menu\">
				<li class='dropdown'>
					<a tabindex='1' href='/site/photography'>".Yii::t('user','Photography')."</a>
					<a tabindex='2' href='/site/cooperation'>".Yii::t('user','Cooperation')."</a>
				</li>
			</ul>
	</li>";

				$menuItems[] = "
	<li class='dropdown'>
		<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">".Yii::t('user','Agency')."</a>
			<ul id=\"yw3\" class=\"dropdown-menu\">";

				foreach (Yii::$app->params['agency'] as $key => $item){
					$menuItems[] =  "<li><a tabindex=".$key." href='".$item['url']."'>".Yii::t('user',$item['menu'])."</a></li>";
				}
				$menuItems[] ="
		</ul>
	</li>";
				$menuItems[] = ['label' => Yii::t('user','Contact'), 'url' => ['/site/contact']];

				if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin) {
					$menuItems[] = ['label' => Yii::t('user','Admins permissions'), 'url' => ['/user/admin/index']];
				}


				echo Nav::widget([
					'options' => ['class' => 'navbar-nav navbar-left'],
					'items' => $menuItems,
				]);
				NavBar::end();


				?>
			</div>
		</div>
	</div>
</div>