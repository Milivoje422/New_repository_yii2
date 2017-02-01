<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Announcement */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Announcement',
]) . $model->announcement_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Announcements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->announcement_id, 'url' => ['view', 'id' => $model->announcement_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="announcement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
