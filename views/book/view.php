<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
Yii::warning($model->image);
?>
<div class="book-view">
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

    <div class="container my-5 z-depth-1">


        <!--Section: Content-->
        <section class="dark-grey-text">

            <div class="row pr-lg-5">
                <div class="col-md-7 mb-4">

                    <div class="view">
                        <img src="<?= Url::to($model->image ? '@web/'.$model->image : '@web/img/books/book_1.jpg') ?>" class="img-fluid" alt="smaple image">
                    </div>

                </div>
                <div class="col-md-5 d-flex align-items-center">
                    <div>

                        <h3 class="font-weight-bold mb-4"><?= $model->title ?></h3>

                        <a href="<?= Url::to(['user/view', 'id' => $model->user->id]) ?>" class="orange-text">
                            <h6 class="font-weight-bold mb-3"><?= $model->user->username ?> -
                                <span class="grey-text"><?= Yii::$app->formatter->asDate($model->updated_at) ?></span>
                            </h6>
                        </a>

                        <p><span class="font-weight-bold">By: </span>
                            <?php foreach ($model->authors as $author): ?>
                                <a href="<?= Url::to(['author/view', 'id' => $author->id]) ?>"
                                   class="font-weight-bold"><?= $author->full_name ?></a>,
                            <?php endforeach; ?>
                        </p>

                        <p><span class="font-weight-bold">Published at:</span>
                            <?= Yii::$app->formatter->asDate($model->published_at) ?>
                        </p>

                        <p><span class="font-weight-bold">Tags: </span>
                            <?php foreach ($model->tags as $tag): ?>
                                <a href="<?= Url::to(['tag/view', 'id' => $tag->id]) ?>"
                                   class="font-weight-bold"><?= $tag->name ?></a>,
                            <?php endforeach; ?>
                        </p>

                        <p><?= $model->description ?></p>

                        <button type="button" class="btn btn-orange btn-rounded mx-0">Download</button>
                    </div>
                </div>
            </div>

        </section>
        <!--Section: Content-->


    </div>

</div>
