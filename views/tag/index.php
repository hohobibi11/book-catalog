<?php

use yii\bootstrap4\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tag', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => LinkPager::class,
        ],
        'columns' => [
            [
                'label' => 'Name',
                'format' => 'raw',
                'filter' => Html::input('text', 'TagSearch[name]',null, ['class' => 'form-control']),
                'value' => function ($data) {
                    return '<a class="btn btn-block btn-blue" href="' . \yii\helpers\Url::to(['view', 'id' => $data['id']]) . '">'.$data['name'].'</a>';
                }
            ],
            'description',
        ],
    ]); ?>


</div>
