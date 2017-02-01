<?php

$items = array(
    array('label' => Yii::t('strings', 'Home'), 'url' => array('/site/index')),
    array('label' => Yii::t('strings', 'Galleries'), 'url' => array('/site/events')),
);

$moreItems = array();

//categories
$itemCats = [1, 2];
$cats = Category::model()->findAll();
foreach ($cats as $cat) {
   $cat->translate(Yii::app()->getLanguage());

   if (in_array($cat->attributes['category_id'], $itemCats))
      $items[] = array('label' => $cat->attributes['category_name'], 'url' => Yii::app()->createUrl('/site/category', array('id' => $cat->attributes['category_id'])));
   else
      $moreItems[] = array('label' => $cat->attributes['category_name'], 'url' => Yii::app()->createUrl('/site/category', array('id' => $cat->attributes['category_id'])));
      
}

if(!empty($moreItems))
   $items[] = array('label'=>Yii::t('strings', 'Categories'),
                    'url'=>'#',
                    'items'=>$moreItems);



//photographers
$users = User::model()->findAll();
$photographers = array();
foreach ($users as $user){
   if (UserRights::isReporter($user->id))
   $photographers[] = array('label' => $user->profile->firstname . ' '. $user->profile->lastname, 'url' => Yii::app()->createUrl('/site/photographer', array('id' => $user->id)));
}

if(!empty($photographers))
   $items[] = array('label'=>Yii::t('strings', 'Photographers'),
                    'url'=>'#',
                    'items'=>$photographers );

$items[] = array('label'=>Yii::t('strings', 'Services'),
                    'url'=>'#',
                    'items'=> array( array('label' => Yii::t('strings', 'Photographing'), 'url' => Yii::app()->createUrl('/site/page', array('id' => 1))),
                                     array('label' => Yii::t('strings', 'Cooperation'), 'url' => Yii::app()->createUrl('/site/page', array('id' => 2)))));

$items[] = array('label'=>Yii::t('strings', 'Agency'),
                    'url'=>'#',
                    'items'=> array( array('label' => Yii::t('strings', 'About Us'), 'url' => Yii::app()->createUrl('/site/page', array('id' => 3))),
                                     array('label' => Yii::t('strings', 'Terms of use'), 'url' => Yii::app()->createUrl('/site/page', array('id' => 4))),
                                     array('label' => Yii::t('strings', 'Agreements'), 'url' => Yii::app()->createUrl('/site/page', array('id' => 5))),
                                     array('label' => Yii::t('strings', 'Friends'), 'url' => Yii::app()->createUrl('/site/page', array('id' => 6))) ));

 $items[] = array('url'=>Yii::app()->createUrl('/site/contact'), 'label'=>Yii::t('strings','Contact'));
 
 
 $redItems = MenuItems::model()->findAll();
 foreach ($redItems as $ri)
   $items[] = array('linkOptions'=>array('style'=>'color:red; font-weight:bold'),   'label' => ((isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] =='sr')? $ri->title_serbian:$ri->title_english ) , 'url' => $ri->link);
 

?>
