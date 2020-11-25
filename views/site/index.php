<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

Yii::warning(\Yii::$app->security->generatePasswordHash('pwd123456'));

?>

