<?php 

$items = array(
    array('label' => Yii::t('strings', 'Home'), 'url' => array('/site/index')),
    array('label' => Yii::t('strings', 'Galleries'), 'url' => array('/site/events')),
);


$moreItems = array();
$itemCats = [1, 2, 3];
$cats = Category::model()->findAll();


foreach ($cats as $cat) {
   $cat->translate(Yii::app()->getLanguage());

   if (in_array($cat->attributes['category_id'], $itemCats)){
      $items[] = array('label' => $cat->attributes['category_name'], 'url' => Yii::app()->createUrl('/site/category', array('id' => $cat->attributes['category_id'])));
      if($cat->attributes['category_id'] == 30)
              $special = array('linkOptions'=>array('style'=>'color:red; font-weight:bold'),   'label' => $cat->attributes['category_name'], 'url' => Yii::app()->createUrl('/site/category', array('id' => $cat->attributes['category_id'])));
   }
   else
      $moreItems[] = array('label' => $cat->attributes['category_name'], 'url' => Yii::app()->createUrl('/site/category', array('id' => $cat->attributes['category_id'])));
   }


if(!empty($moreItems))
   $items[] = array(
       'label'=>Yii::t('strings', 'Other'),
       'url'=>'#',
       'items'=>$moreItems
   );

if(UserRights::isAgencia() || UserRights::isCompany() || UserRights::isTempUser() || UserRights::isOnlyUser())
   $items[] = array('label' =>  Yii::t('strings', 'Subscribed'), 'url' => Yii::app()->createUrl('/site/canDownload'));

//$items[] = array('label'=>Yii::t('strings','Photo Events'), 'url'=>array('/site/events'));
//$items[] = array('url'=>"#", 'label'=>Yii::t('strings','Archive'));
$items[] = array(
    'label' => Yii::t('strings', 'Service info'),
    'items' => array(
        array('url' => Yii::app()->createUrl('/imageTransaction'), 'label' => Yii::t('strings', 'Transactions')),
        array('url' => Yii::app()->getModule('user')->profileUrl, 'label' => Yii::t('strings', 'Profile')),
        array('url' => Yii::app()->createUrl('/user/profile/edit'), 'label' => Yii::t('strings', 'Update Profile')),
        array('url' => Yii::app()->createUrl('user/profile/changepassword'), 'label' => Yii::t('strings', 'Change Password')),
    )
);

 $redItems = MenuItems::model()->findAll();
 foreach ($redItems as $ri)
   $items[] = array('linkOptions'=>array('style'=>'color:red; font-weight:bold'),   'label' => ((isset(Yii::app()->session['lang']) && Yii::app()->session['lang'] =='sr')? $ri->title_serbian:$ri->title_english ) , 'url' => $ri->link); 

?>