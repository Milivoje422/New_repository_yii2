<?php //header("Content-type: text/html; charset=UTF-8"); ?>
<?php $lng = ((Yii::app()->getLanguage() == "en") ? 'en' : 'sr');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=$lng?>" lang="<?=$lng?>">
   <head>
      
      <meta name="language" content="<?=$lng?>" />      
      <meta name="description" content="<?php echo $this->metaDescription; ?>" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
      
      <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl.'/js/script.js'); ?>
      <link rel="shortcut icon" href= "<?=Yii::app()->getBaseUrl()?>/favicon.ico" type="image/x-icon"/>
      
      <?php 
      if(Yii::app()->controller->id == 'getPhoto' && Yii::app()->controller->action->id == 'view'){ ?>
         <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/thumbnailscroller/jquery.mThumbnailScroller.css"  />
         <?php Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/thumbnailscroller/jquery.mThumbnailScroller.js'); ?>
      <?php } ?>
         
      <title><?php echo CHtml::encode($this->pageTitle); ?></title>

      <?php Yii::app()->bootstrap->register(); ?>
      <!--[if !IE 7]>
      <style type="text/css">
          #wrap {display:table;height:100%}
      </style>
  <![endif]-->
   </head>

   <body>
      

      <?php $this->widget('ext.tooltipster.tooltipster',array('options'=>array('position'=>'right'))); ?>
      <div id="wrap">

         <?php
         $enSel = (Yii::app()->getLanguage() == "en") ? " selected='selected' " : "";
         $srSel = (Yii::app()->getLanguage() == "en") ? " selected='selected' " : "";
         ?>
         <?php
         if (Yii::app()->user->isGuest)
            include_once 'menuPublic.php';
         if (UserRights::isAdmin())
            include_once 'menuAdmin.php';
         if (UserRights::isRedactor())
            include_once 'menuRedactor.php';
         if (UserRights::isOnlyUser() || UserRights::isAgencia() || UserRights::isCompany() || UserRights::isModerator() || UserRights::isTempUser() )
            include_once 'menuUser.php';
         if (UserRights::isReporter() )
            include_once 'menuReporter.php';



         $this->widget('TbNavbarCustom', array(
             'brand' => '',
             'brandUrl' => '#',
             'collapse' => false,
             //'type' => 'inverse',
             'items' => array(
                 array(
                     'class' => 'bootstrap.widgets.TbMenu',
                     'items' => $items,
                 ),
                /* '<div style="float:right; margin-right:80px; display:inline-block;">
            <select id="langPicker" style="width: 90px; margin-top: 4px; position: absolute; ">
               <option value="sr" ' . $srsel . ' >Srpski</option>
               <option value="en" ' . $enSel . ' >English</option>           
            </select>
        </div>'*/
             ),
         ));
         ?>

         <div class="container" id="page">

            <?php if (isset($this->breadcrumbs)): ?>
               <?php
               $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                   'links' => $this->breadcrumbs,
               ));
               ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>



            <?php
            /* 	print "Is Admn: ".((UserRights::isAdmin())?'Y':'N').'<br>';
              print "Is Only User: ".((UserRights::isOnlyUser())?'Y':'N').'<br>';
              print "Is Reporter: ".((UserRights::isReporter())?'Y':'N').'<br>';
              print "Is Moderator: ".((UserRights::isModerator())?'Y':'N').'<br>';
              print "Is Agencia: ".((UserRights::isAgencia())?'Y':'N').'<br>';
             */
            ?>
         </div><!-- page -->
      </div>	<!-- wrap -->      
      
      
      <div class="footer-banner-wrap">
         <div class="footer-content">
              <?php
                  $banners = Banners::model()->findAll(array('condition'=>'banner_status="ACTIVE" AND banner_type="FOOTER" ', 'limit'=>15));
                  foreach ($banners as $banner) {
                              print '<a href="'.$banner->attributes['banner_url'].'" target="_blank" ><img class="bottom-banner" src="'.Yii::app()->getBaseurl().'/banners/'.$banner->attributes['banner_image'].'" /></a>' ;
                  }              
               ?>
           </div>
      </div>
      
      <div id="footer">
         <div class="footer-content">         
         <div class="footer-content footer-links">
            <?php $cats = Category::model()->findAll(); $catnumber = count($cats); ?>
             <div class="footer-links-block"> 
                <ul>
                  <?php 
                  if($catnumber>4)
                   for($i=3; $i<8 && $i<$catnumber; $i++){                    
                        $cats[$i]->translate(Yii::app()->getLanguage());                         
                        print '<li><a href="'.Yii::app()->createUrl('/site/category', array('id' => $cats[$i]->attributes['category_id'])).'" >'.$cats[$i]->attributes['category_name'].'</a></li>';
                   }
                  ?>
               </ul> 
            </div>
            
             <div class="footer-links-block"> 
                <ul>
                  <?php 
                  if($catnumber>8)
                   for($i=8; $i<12 && $i<$catnumber; $i++){                    
                        $cats[$i]->translate(Yii::app()->getLanguage());                         
                        print '<li><a href="'.Yii::app()->createUrl('/site/category', array('id' => $cats[$i]->attributes['category_id'])).'" >'.$cats[$i]->attributes['category_name'].'</a></li>';
                   }
                  ?>
               </ul> 
            </div>
            
             <div class="footer-links-block"> 
                <ul>
                  <?php 
                   for($i=0; $i<4 && $i<$catnumber; $i++){                    
                        $cats[$i]->translate(Yii::app()->getLanguage());                         
                        print '<li><a href="'.Yii::app()->createUrl('/site/category', array('id' => $cats[$i]->attributes['category_id'])).'" >'.$cats[$i]->attributes['category_name'].'</a></li>';
                   }
                  ?>
               </ul> 
            </div>
           
            <?php /*
            
            <div class="footer-links-block flc" >
               <a href="/"><img src="<?=Yii::app()->getBaseurl() ?>/footer-logo.png" alt=""  /></a>
               <span>&COPY; Zipa Foto <?=date('Y')?>. <?=Yii::t('strings','All Rights reserved') ?></span>
            </div>
            */
            ?>
            <div class="footer-links-block" style="float: right">
               <ul>
                  <li><a href="<?=Yii::app()->createurl('/site/contact') ?>" ><?=Yii::t('strings','Contact')  ?></a></li>
                  <li><a href="<?=Yii::app()->createurl('/user/registration') ?>" ><?=UserModule::t("Register") ?></a></li>
                  <li><a href="<?=Yii::app()->createurl('/user/login') ?>" ><?=Yii::t('strings','Login')  ?></a></li>
                  <li><a href="<?=Yii::app()->createurl('/site/page', array('id'=>4)) ?>" ><?=Yii::t('strings','Terms of use')  ?></a></li>
               </ul>
            </div>
         </div>
       </div>
      </div><!-- footer -->


      <script>
         $('#langPicker').on('change', function() {
            $.ajax({
               url: "<?php print Yii::app()->createUrl('/site/language'); ?>",
               type: "post",
               data: "lang=" + this.value,
               success: function() {
                  location.reload();
               },
               error: function() {
               }
            });
         });
      </script>
      
    <?php    
    //LOGIN lightbox
    $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'loginModal')); ?>

      <div class="modal-header">
         <a class="close" data-dismiss="modal">&times;</a>
         <h4><?php print Yii::t('strings','Login')   ?> </h4>
      </div>

      <div class="modal-body">

         <script>
            var img=new Image();
            img.src="<?=Yii::app()->getbaseUrl('') ?>/themes/bootstrap/img/ajax-loader.gif";
            function loginValidateLb(data) {
               pdata = jQuery.parseJSON(data);
               if (data.status == 'OK'){
                  $("#llb-error-block").html('');
                  document.location = data.url;
               }
               if (data.status == 'ERROR') {
                  var errorMsg = "";
                  
                  if (data.msg.username !== undefined) {
                     $('#UserLogin_username').addClass('error');
                     $('#UserLogin_username').attr('title',data.msg.username);
                     errorMsg += data.msg.username+'<br>';
                  } else {
                     $('#UserLogin_username').removeClass('error');
                      $('#UserLogin_username').attr('title','');
                  }

                  if (data.msg.password !== undefined) {
                     $('#UserLogin_password').addClass('error');
                     $('#UserLogin_password').attr('title',data.msg.password);
                     errorMsg += data.msg.password+'<br>';
                  } else {
                     $('#UserLogin_password').removeClass('error');
                     $('#UserLogin_password').attr('title','');
                  }
                  
                  $(".llb-error-block").html(errorMsg);
               }

            }
         </script>
         
         <?php 
         print '<div class="row-fuid">';
         print '<div class="span4 llb-error-block"></div>';
         print '<div class="span2">';            
            $model = new UserLogin;
            echo CHtml::beginForm(array('/user/login'));
            echo CHtml::activeLabelEx($model,'username');
            echo CHtml::activeTextField($model, 'username');
            echo '<br/>';
            echo CHtml::activeLabelEx($model,'password');
            echo CHtml::activePasswordField($model, 'password');
            echo '<br/>';
            echo CHtml::activeCheckBox($model,'rememberMe');
            echo CHtml::activeLabelEx($model,'rememberMe',array('style'=>'display:inline;')); 
            echo '<br/><br/>';

            echo CHtml::ajaxSubmitButton(UserModule::t("Login"), Yii::app()->createUrl('/user/login'), array(
                'type' => 'POST',
                'dataType' => 'json',
                'beforeSend'=>"js:function(data){ $('.ajax-loading').show();}",
                'success' => "js:function(data){ $('.ajax-loading').hide(); loginValidateLb(data); } "
            ));
            echo CHtml::endForm();
          print '</div>';//span12
          print '<div class="span2 offset1"><p class="hint" style="margin-top:16px;">'.CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl).'<br/>'. CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl).'</p></div>';
          print '<div class="span2"><div class="ajax-loading"></div></div>';
          print '</div>';//row
         ?>
      </div>
      <?php $this->endWidget(); ?>


      <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

         ga('create', 'UA-57909227-1', 'auto');
         ga('send', 'pageview');

       </script>
   </body>
</html>
