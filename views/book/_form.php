<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container z-depth-1 my-5 px-0">

    <!--Section: Content-->
    <section class="p-5 my-md-5 text-center"
             style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background2.jpg); background-size: cover; background-position: center center;">

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'title')->textInput(['placeholder' => 'Title'])->label(false) ?>
            </div>

            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'published_at')->widget(\yii\jui\DatePicker::class, [
                    'value' => date('Y-m-d'),
                    'options' => ['class' => 'form-control'],
                ])->label(false) ?>
            </div>
        </div>

        <!--authors-->
        <div class="row">
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'author1')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Author::find()->select(['id', 'full_name'])->asArray()->all(), 'id', 'full_name'),
                        [
                            'class' => 'form-control',
                            'prompt' => 'Select Author...',
                            'value' => $model->author1
                        ]
                    )->label(false);
                ?>
            </div>
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'author2')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Author::find()->select(['id', 'full_name'])->asArray()->all(), 'id', 'full_name'),
                        [
                            'class' => 'form-control',
                            'prompt' => 'Select Author...',
                            'value' => $model->author2
                        ]
                    )->label(false);
                ?>
            </div>
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'author3')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Author::find()->select(['id', 'full_name'])->asArray()->all(), 'id', 'full_name'),
                        [
                            'class' => 'form-control',
                            'prompt' => 'Select Author...',
                            'value' => $model->author3
                        ]
                    )->label(false);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'author4')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Author::find()->select(['id', 'full_name'])->asArray()->all(), 'id', 'full_name'),
                        [
                            'class' => 'form-control',
                            'prompt' => 'Select Author...',
                            'value' => $model->author4
                        ]
                    )->label(false);
                ?>
            </div>
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'author5')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Author::find()->select(['id', 'full_name'])->asArray()->all(), 'id', 'full_name'),
                        [
                            'class' => 'form-control',
                            'prompt' => 'Select Author...',
                            'value' => $model->author5
                        ]
                    )->label(false);
                ?>
            </div>
        </div>

        <!--tags-->
        <div class="row">
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'tag1')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Tag::find()->select(['id', 'name'])->asArray()->all(), 'id', 'name'),
                        [
                            'class' => 'form-control',
                            'prompt' => 'Select tag...',
                            'value' => $model->tag1
                        ]
                    )->label(false);
                ?>
            </div>
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'tag2')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Tag::find()->select(['id', 'name'])->asArray()->all(), 'id', 'name'),
                        [
                            'class' => 'form-control',
                            'prompt' => 'Select tag...',
                            'value' => $model->tag2
                        ]
                    )->label(false);
                ?>
            </div>
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'tag3')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Tag::find()->select(['id', 'name'])->asArray()->all(), 'id', 'name'),
                        [
                            'class' => 'form-control',
                            'prompt' => 'Select tag...',
                            'value' => $model->tag3
                        ]
                    )->label(false);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'tag4')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Tag::find()->select(['id', 'name'])->asArray()->all(), 'id', 'name'),
                        [
                            'class' => 'form-control',
                            'prompt' => 'Select tag...',
                            'value' => $model->tag4
                        ]
                    )->label(false);
                ?>
            </div>
            <div class="col-md-4 mb-4">
                <?= $form->field($model, 'tag5')
                    ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Tag::find()->select(['id', 'name'])->asArray()->all(), 'id', 'name'),
                        [
                            'class' => 'form-control',
                            'prompt' => 'Select tag...',
                            'value' => $model->tag5
                        ]
                    )->label(false);
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-4">
                    <div class="custom-file">
                        <?= $form->field($model, 'image')->fileInput([
                            'class' => 'custom-file-input', 'id' => 'customFileLang', 'lang' => 'en'
                        ])->label('Upload Image', ['class' => 'custom-file-label', 'for' => 'customFileLang']) ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="form-group mb-4">
                    <?= $form->field($model, 'description')->textarea([
                        'placeholder' => 'Describe the book',
                        'class' => 'form-control rounded',
                        'rows' => 3
                    ])->label(false) ?>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-elegant">Submit</button>
                </div>

            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </section>
    <!--Section: Content-->


</div>