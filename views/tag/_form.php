<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container z-depth-1 my-5 px-0">

    <!--Section: Content-->
    <section class="p-5 my-md-5 text-center"
             style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background2.jpg); background-size: cover; background-position: center center;">

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-12 mb-4">
                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Tag Name'])->label(false) ?>
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
