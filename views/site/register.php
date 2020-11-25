<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container my-5 py-5 z-depth-1">


    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


        <!--Grid row-->
        <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-6">

                <!-- Default form subscription -->
                <?php $form = ActiveForm::begin(['options' => ['class ' => 'text-center']]); ?>
                <form class="text-center" action="#!">

                    <p class="h4 mb-4">Subscribe</p>

                    <p>Join our Book list. We publish rarely, but only the best content.</p>

                    <p>
                        <a href="<?= \yii\helpers\Url::home() ?>" target="_blank">See the last Books</a>
                    </p>

                    <!-- Name -->
                    <?= $form->field($model, 'username')->textInput([
                        'maxlength' => true,
                        'class' => 'form-control mb-4',
                        'id' => 'defaultSubscriptionFormPassword',
                        'placeholder' => 'Username'
                    ])->label(false) ?>

                    <!-- Password -->
                    <?= $form->field($model, 'password')->passwordInput([
                            'maxlength' => true,
                        'class' => 'form-control mb-4',
                        'placeholder' => 'Password',
                        'id' => 'defaultSubscriptionFormEmail'
                    ])->label(false) ?>

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block" type="submit">Sign in</button>

                    <?php ActiveForm::end(); ?>
                    <!-- Default form subscription -->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </section>
    <!--Section: Content-->
</div>
