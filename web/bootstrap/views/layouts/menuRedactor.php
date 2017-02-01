<?php 
$items=array(                
                array('label'=>Yii::t('strings','Login'), 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::t('strings','Register'), 'visible'=>Yii::app()->user->isGuest),                
                array('label' => Yii::t('strings', 'Home'), 'url' => array('/site/index')),
                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::t('strings','Profile'), 'visible'=>!Yii::app()->user->isGuest),
    

               //images
                array('label'=>Yii::t('strings','Photos'), 
                    'items'=> array(                        
                                 array('label'=>Yii::t('strings','Manage Photos'), 'url'=>Yii::app()->createUrl('/photo')),
                                 array('label'=>Yii::t('strings','Events'), 'url'=>Yii::app()->createUrl('/photoEvent'))
                               )), 
                
                //pages
               array('label'=>Yii::t('strings','Pages'), 
                    'items'=> array(                        
                                // array('label'=>Yii::t('strings','Add'), 'url'=>Yii::app()->createUrl('/pages/create')),
                                 array('label'=>Yii::t('strings','Manage'), 'url'=>Yii::app()->createUrl('/pages/admin')),									
                               )),
    
            );
?>