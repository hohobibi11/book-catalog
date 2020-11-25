<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">

    <div class="row">
        <div class="col-auto">
            <?= Html::a('Create Author', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <!-- Filter -->
        <div class="col-auto ml-auto">
            <div class="md-form mt-1 ml-auto">
                <?php $form = \yii\widgets\ActiveForm::begin(['method' => 'Get']); ?>
                <?= $form->field($searchModel, 'full_name')
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
        </div>
    </div>


    <div class="container my-5">
        <!--Section: Content-->
        <section class="team-section text-center dark-grey-text">

            <!-- Section heading -->
            <h3 class="font-weight-bold pb-2 mb-4">Authors</h3>
            <!-- Section description -->
            <p class="text-muted w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
                eum porro a pariatur veniam.</p>

            <!-- Grid row -->
            <div class="row">
                <?php foreach ($dataProvider->models as $model): ?>
                    <!-- Grid column -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="avatar mx-auto">
                            <img src="<?= \yii\helpers\Url::to($model->image ? '@web/' . $model->image : '@web/img/authors/author_1.jpg') ?>"
                                 class="rounded-circle z-depth-1"
                                 alt="Sample avatar">
                        </div>
                        <a href="<?= \yii\helpers\Url::to(['view', 'id' => $model->id]) ?>"><h5
                                    class="font-weight-bold mt-4 mb-3"><?= $model->full_name ?></h5></a>
                        <p class="text-uppercase pink-text">
                            <strong><?= Yii::$app->formatter->asDate($model->birth_date) ?></strong></p>
                        <p class="grey-text"><?= $model->description ?></p>
                    </div>
                    <!-- Grid column -->
                <?php endforeach; ?>
            </div>
            <!-- Grid row -->

        </section>
        <!--Section: Content-->
    </div>
    <?= \yii\bootstrap4\LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>
</div>
