<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name ;
$this->metaDescription = Yii::t('strings', 'First Private Photo Agency in Republic of Srpska. Photos, Galeries, News, Reportages, Religion, Travel, Politics...');
?>

<?php
          
    if(is_array($topBanners) && !empty($topBanners))
      foreach($topBanners as $tbanner)   
         print '<a href="'.$tbanner->attributes['banner_url'].'" target="_blank" ><img width="100%" src="'.Yii::app()->getBaseurl().'/banners/'.$tbanner->attributes['banner_image'].'" /></a><br/><br/>' ;
   
?>


   <?php
   $cr = new CDbCriteria(  array('condition' =>'announcement_status = "ACTIVE" OR (announcement_status = "AUTO" and announcement_auto_active_from < now() AND announcement_auto_active_to > now()) ', 'order'=>'announcement_id desc')  );
 $ans =  Announcement::model()->findAll($cr);
 if($ans != NULL){ 
    print '<h2>' . Yii::t('strings','Announcements') . '</h2>';
    $n = count($ans);
    $i = 0;
    print '<div class="alert in alert-block fade alert-info"> ';
      foreach($ans as $an){
         $an->translate(Yii::app()->session['lang']);
         $time = '';
         if($an->attributes["announcement_status"]=='ACTIVE' && $an->attributes['announcement_start_time']!=NULL && $an->attributes['announcement_start_time']!='' && $an->attributes['announcement_start_time']!='0000-00-00 00:00:00') $time = date('d.m.Y',strtotime ($an->attributes['announcement_start_time']));
         if($an->attributes["announcement_status"]=='AUTO' && $an->attributes['announcement_auto_active_from']!=NULL && $an->attributes['announcement_auto_active_from']!='' && $an->attributes['announcement_auto_active_from']!='0000-00-00 00:00:00') $time = date('d.m.Y',strtotime ($an->attributes['announcement_auto_active_from']));
         print '<strong>'.$an->attributes['announcement_title'].', '.$time.'</strong><br/>';
         print $an->attributes['announcement_content'];
         if(++$i < $n) print '<br/><br/>';
      }
    print '</div>';
 }
?>   


<?php
$i = array();
$images = SliderImages::model()->findAll(array('condition'=>'slider_image_status=1', 'order'=>'slider_image_id desc', 'limit'=>7));
if($images!=NULL){
   foreach($images as $image){
      $image->translate(Yii::app()->getLanguage());
      $i[]=array('src' => '/'.Yii::app()->params['slash'].Yii::app()->params['sliderImageFolder'].$image->attributes['slider_image_file'],'caption'=>'<span style="font-weight:bold">'.$image->attributes['slider_image_title'].'</span><br/>'.$image->attributes['slider_image_description']);
   }
}

$this->widget('application.extensions.nivoslider.ENivoSlider', array(
    'htmlOptions' => array('style' => "width: 1172px; height: 482px; margin:auto;"),
    'images' => $i,
        )
);

?>



<br/>
<br/>

<div style="width: 1172px; margin: auto;">


    <?php   
    
    print '<h4>'.Yii::t('strings', 'Latest photos on service') . '</h4>';    
    
    print '<div class="latestEvents" >';
        $n = (count($latestEvents) > 7) ? 7 : count($latestEvents);
        for ($i = 0; $i < $n; $i++) {
            $this->Widget('PhotoEventWidget', array(
                'model' => $latestEvents[$i],
            ));
           if($i+1<$n) print '<hr class="divider-line" />';
        }    
    print '</div>';
    
    
    
    
    print '<div class="rightBlock" >';    
    if(is_array($banners) && !empty($banners))
      foreach($banners as $banner)   
         print '<a href="'.$banner->attributes['banner_url'].'" target="_blank" ><img src="'.Yii::app()->getBaseurl().'/banners/'.$banner->attributes['banner_image'].'" /></a><br/><br/>' ;
    print '</div>';
    
    print '<hr class="divider-line" />';
    
    
    print '<div style="width:100%; text-align:center; display:inline-block;" >';
    if(is_array($centralBanners) && !empty($centralBanners))
      foreach($centralBanners as $centralBanner)   
         print '<a href="'.$centralBanner->attributes['banner_url'].'" target="_blank" ><img src="'.Yii::app()->getBaseurl().'/banners/'.$centralBanner->attributes['banner_image'].'" /></a><br/><br/>' ;
    print '</div>';
    
    print '<h4>'.Yii::t('strings', 'Other photos on service') . '</h4>';
    print '<div class="latestEvents2" >';
    $limit = ((count($latestEvents) > 27)? 27 : count($latestEvents));
    if ($limit > 7) {
       $k=0;
        for ($i = 7; $i < $limit; $i++) {
           $k++;
            $this->Widget('PhotoEventWidget', array(
                'model' => $latestEvents[$i],
                //'size'=>'_mini-home',
                'size'=>'_mini',
                'showIt3'=>false,
                'imageWidth' => 255,
                'liwWidth' => 265,
                'customWrapperStyle' => (($k % 4 != 0) ? 'margin-right: 34.6px;' : 'margin-right: 0px;'),
            ));
            
            if($i+1 == $limit) print '<hr class="divider-line" />';
        }
    }
    print '</div>';
    ?>
</div>