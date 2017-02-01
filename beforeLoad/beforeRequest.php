<?php
/**
 * Created by PhpStorm.
 * User: Windows10
 * Date: 21.12.2016.
 * Time: 22:05
 */

namespace app\beforeLoad;
use \yii\base\Behavior;

class beforeRequest extends Behavior{

    public function events()
    {
        return [
            \yii\web\Application::EVENT_BEFORE_REQUEST => 'checkLanguage',
        ];
    }

    public function checkLanguage()
    {
        if(\Yii::$app->getRequest()->getCookies()->has('lang'))
            \Yii::$app->language = \Yii::$app->getRequest()->getCookies()->getValue('lang');
    }
}