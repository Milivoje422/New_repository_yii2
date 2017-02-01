<?php 
$items = array(
                //images
                array('label'=>Yii::t('strings','Photos'), 
                    'items'=> array(
                                 array('label'=>Yii::t('strings','Dodaj'), 'url'=>Yii::app()->createUrl('/photoEvent/upload')),
                                 array('label'=>Yii::t('strings','Manage Photos'), 'url'=>Yii::app()->createUrl('/photo')),	
                                 '-',
                                 array('label'=>Yii::t('strings','Events'), 'url'=>Yii::app()->createUrl('/photoEvent'))								
                               )),
                
                array('url'=>Yii::app()->createUrl('/imageTransaction'), 'label'=>Yii::t('strings','Transactions')),
                array('label'=>Yii::t('strings','Views'), 'url'=>Yii::app()->createUrl('/imageViewLog')),		
                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::t('strings','Profile'), 'visible'=>!Yii::app()->user->isGuest),
            );
?>