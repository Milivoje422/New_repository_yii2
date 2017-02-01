<?php 
$items=array(                
                array('label'=>Yii::t('strings','Login'), 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::t('strings','Register'), 'visible'=>Yii::app()->user->isGuest),                
                array('label' => Yii::t('strings', 'Home'), 'url' => array('/site/index')),
                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::t('strings','Profile'), 'visible'=>!Yii::app()->user->isGuest),
    
                //categories
                array('label'=>Yii::t('strings','Categories'),
                       'items'=> array(
                           array('label'=>Yii::t('strings','Add Category'), 'url'=>Yii::app()->createUrl('/category/create')),
                           array('label'=>Yii::t('strings','Manage Categories'), 'url'=>Yii::app()->createUrl('/category/index'))
                       )),	

                //users
                 array('label'=>Yii::t('strings','Users'),
                     'items'=> array(
                                   array('label'=>Yii::t('strings','Manage Users'), 'url'=>Yii::app()->createUrl('/user/admin')),
                                   array('label'=>Yii::t('strings','List Users'), 'url'=>Yii::app()->createUrl('/user')),
                                   '-',
                                   array('label'=>Yii::t('strings','User Rights'), 'url'=>Yii::app()->createUrl('/rights')),
                               )),

               //images
                array('label'=>Yii::t('strings','Photos'), 
                    'items'=> array(                        
                                 array('label'=>Yii::t('strings','Dodaj'), 'url'=>Yii::app()->createUrl('/photoEvent/upload')),
                                 array('label'=>Yii::t('strings','Manage Photos'), 'url'=>Yii::app()->createUrl('/photo')),	
                                 '-',
                                 array('label'=>Yii::t('strings','Events'), 'url'=>Yii::app()->createUrl('/photoEvent'))
                               )),               

                 //photo events
               /* array('label'=>Yii::t('strings','Events'),
                    'items'=> array(
                        array('label'=>Yii::t('strings','Manage Photo Events'), 'url'=>Yii::app()->createUrl('/photoEvent'))
                       )),*/
                
               //banners
               array('label'=>Yii::t('strings','Banners'), 
                    'items'=> array(                        
                                 array('label'=>Yii::t('strings','Add'), 'url'=>Yii::app()->createUrl('/banners/create')),
                                   array('label'=>Yii::t('strings','Manage Banners'), 'url'=>Yii::app()->createUrl('/banners')),									
                               )),
               //slider  images
               array('label'=>Yii::t('strings','Slider'), 
                    'items'=> array(                        
                                 array('label'=>Yii::t('strings','Add'), 'url'=>Yii::app()->createUrl('/sliderImages/create')),
                                   array('label'=>Yii::t('strings','Manage'), 'url'=>Yii::app()->createUrl('/sliderImages/admin')),									
                               )),
                //pages
               array('label'=>Yii::t('strings','Pages'), 
                    'items'=> array(                        
                                 array('label'=>Yii::t('strings','Add'), 'url'=>Yii::app()->createUrl('/pages/create')),
                                   array('label'=>Yii::t('strings','Manage'), 'url'=>Yii::app()->createUrl('/pages/admin')),									
                               )),
               array('label'=>Yii::t('strings','Announcements'),
                    'items'=> array(                        
                                 array('label'=>Yii::t('strings','Add'), 'url'=>Yii::app()->createUrl('/announcement/create')),
                                   array('label'=>Yii::t('strings','Manage'), 'url'=>Yii::app()->createUrl('/announcement')),									
                               )),
                //photo transactions
                array('url'=>Yii::app()->createUrl('/imageTransaction'), 'label'=>Yii::t('strings','Transactions')),
    
                //logs
                 //images
                array('label'=>Yii::t('strings','Logs'), 
                    'items'=> array(                        
                                 array('label'=>Yii::t('strings','Users actions'), 'url'=>Yii::app()->createUrl('/actionLog')),
                                 array('label'=>Yii::t('strings','Downloads'), 'url'=>Yii::app()->createUrl('/downloadLog')),
                                 array('label'=>Yii::t('strings','Views'), 'url'=>Yii::app()->createUrl('/imageViewLog')),		
                                 array('label'=>Yii::t('strings','Upload'), 'url'=>Yii::app()->createUrl('/actionLog/uploadStats')),		
                               )), 
                               
                array('url'=>Yii::app()->createUrl('/site/latest'), 'label'=>Yii::t('strings','New')),
                array('url'=>Yii::app()->createUrl('/menuItems'), 'label'=>"Meni"),
    
            );
?>

