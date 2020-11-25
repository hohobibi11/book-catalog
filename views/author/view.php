<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Author */
/* @var $searchModel app\models\TagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="author-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="container z-depth-1 py-5 my-5">
        <section class="mx-md-5 text-center text-lg-left">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="row p-5">
                        <div class="col-lg-8 d-flex flex-column justify-content-between">
                            <p class="text-muted mb-4"><?= $model->description ?></p>
                            <div>
                                <p class="font-weight-bold lead mb-2"><strong><?= $model->full_name ?></strong></p>
                                <p class="font-weight-bold text-muted">
                                    <?= Yii::$app->formatter->asDate($model->birth_date) .' - ' . ($model->death_date ? Yii::$app->formatter->asDate($model->death_date) : 'Today') ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex mb-2 align-items-center">
                            <div class="avatar mx-4 w-100 white d-flex justify-content-center align-items-center">
                                <img src="<?= \yii\helpers\Url::to($model->image? '@web/'.$model->image : '@web/img/authors/author_1.jpg') ?>"
                                     class="rounded-circle img-fluid z-depth-1" alt="woman avatar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?= $this->render('/book/index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>
</div>
