<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
$count = 0;
?>
<div class="container">
    <div class="row">
        <!-- Sort -->
        <div class="col-auto">
            <div class="btn-group dropright">
                <button type="button" class="btn btn-primary">Sort By</button>
                <button type="button" class="btn btn-primary dropdown-toggle px-3" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= $dataProvider->sort->createUrl('title') ?>">Title</a>
                    <a class="dropdown-item" href="<?= $dataProvider->sort->createUrl('published_at') ?>">Publish
                        Date</a>
                    <a class="dropdown-item" href="<?= $dataProvider->sort->createUrl('created_at') ?>">Creation
                        Date</a>
                </div>
            </div>
        </div>
        <!-- Filter -->
        <div class="md-form mt-1 ml-auto">
            <?php $form = \yii\widgets\ActiveForm::begin(['method' => 'Get']); ?>
            <?= $form->field($searchModel, 'authorName')
                ->textInput([
                    'class' => "author-ac form-control",
                    'placeholder' => "Author",
                    'aria-label' => "Search"
                ])->label(false) ?>
            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>
        <script>
            //auto complete ajax url
            var url_ac = "<?= Url::to(['author/list']) ?>";
        </script>

        <div class="md-form mt-1 ml-auto">
            <?php $form = \yii\widgets\ActiveForm::begin(['method' => 'Get']); ?>
            <?= $form->field($searchModel, 'titleDesc')
                ->textInput([
                    'class' => "form-control",
                    'placeholder' => "Title or description",
                    'aria-label' => "Search"
                ])->label(false) ?>
            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>

    </div>
</div>

<?php \yii\widgets\Pjax::begin(); ?>
<div class="container mt-5">
    <!--Section: Content-->
    <section class="dark-grey-text text-center">
        <!-- Grid row -->
        <div class="row">
            <?php foreach ($dataProvider->models as $model): ?>
                <?php
                switch ($count % 3) {
                    case 0:
                        $color = 'pink';
                        break;
                    case 1:
                        $color = 'deep-orange';
                        break;
                    case 2:
                        $color = 'blue';
                        break;
                }
                $count++;
                ?>
                <!-- Grid column -->
                <div class="col-lg-4 col-md-12 mb-4">

                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-2 mb-4">
                        <img class="img-fluid" src="<?= Url::to($model->image ? '@web/'.$model->image : '@web/img/books/book_1.jpg') ?>"
                             alt="book image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Category -->
                    <a href="<?= Url::to(['/user/view', 'id' => $model->user->id]) ?>" class="<?= $color ?>-text">
                        <h6 class="font-weight-bold mb-3"><i class="fas fa-map pr-2"></i><?= $model->user->username ?>
                            <span class="grey-text"><?= Yii::$app->formatter->asDate($model->created_at) ?></span>
                        </h6>
                    </a>
                    <!-- Post title -->
                    <h4 class="font-weight-bold mb-3"><strong><?= $model->title ?></strong></h4>
                    <!-- Post data -->
                    <p>by
                        <?php foreach ($model->authors as $author): ?>
                            <a href="<?= Url::to(['/author/view', 'id' => $author->id]) ?>"
                               class="font-weight-bold"><?= $author->full_name ?></a>,
                        <?php endforeach; ?>
                        <?= Yii::$app->formatter->asDate($model->published_at) ?></p>
                    <!-- Excerpt -->
                    <p class="dark-grey-text"><?= $model->description ?></p>
                    <!-- Read more button -->
                    <a href="<?= Url::to(['/book/view', 'id' => $model->id]) ?>"
                       class="btn btn-<?= $color ?> btn-rounded btn-md">About The book</a>

                </div>
                <!-- Grid column -->
            <?php endforeach; ?>
        </div>
        <!-- Grid row -->
    </section>
    <!--Section: Content-->
    <?= \yii\bootstrap4\LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>
</div>
<?php \yii\widgets\Pjax::end(); ?>
