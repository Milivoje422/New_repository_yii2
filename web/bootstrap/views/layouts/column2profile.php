<?php /* @var $this Controller */  ?>
<?php $this->beginContent('//layouts/main'); 

if(Yii::app()->user->hasFlash('profile'))
   print '<div  class="alert in alert-block fade alert-info">
       <a class="close" data-dismiss="alert">×</a>
       <strong>'.Yii::t('strings','Welcome').' '.Yii::app()->user->getName().'!</strong><br/>'.Yii::app()->user->getFlash('profile').'
    </div>';
?>

<div class="row">
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span3">
        <div id="sidebar">
       
           <?php
              if (UserModule::isAdmin()) {
              $this->widget('bootstrap.widgets.TbButton', array(
                  'label' => UserModule::t('Manage Users'),
                  'buttonType' => 'link',
                  'url' => array('/user/admin'),
                  'type' => 'success',
                  'icon' => "icon-wrench icon-white",
                  'block' => true,
              ));
              print '<br/>';
           }
           $this->widget('bootstrap.widgets.TbButton', array(
               'label' => Yii::t('strings', 'Update Profile'),
               'buttonType' => 'link',
               'url' => array('edit'),
               'type' => 'success',
               'icon' => "icon-user icon-white",
               'block' => true,
           ));
           print '<br/>';
           $this->widget('bootstrap.widgets.TbButton', array(
               'label' => Yii::t('strings', 'Change Password'),
               'buttonType' => 'link',
               'url' => array('changepassword'),
               'type' => 'success',
               'icon' => "icon-ok icon-white",
               'block' => true,
           ));
           
           ?>
           
           
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>