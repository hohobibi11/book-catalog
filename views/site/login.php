<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container my-5 py-5 z-depth-1">


    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


        <!--Grid row-->
        <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-6">

                <!-- Default form login -->
                <?php $form = ActiveForm::begin([
                    'options' => ['class' => 'text-center'],
                ]); ?>
                <p class="h4 mb-4">Sign in</p>

                <!-- Email -->
                <?= $form->field($model, 'username')->textInput([
                    'autofocus' => true,
                    'class' => 'form-control mb-4',
                    'placeholder' => 'Username',
                    'id' => 'defaultLoginFormEmail',
                ])->label(false) ?>


                <!-- Password -->
                <?= $form->field($model, 'password')->passwordInput([
                    'class' => 'form-control mb-4',
                    'placeholder' => 'Password',
                    'id' => 'defaultLoginFormPassword',
                ])->label(false) ?>

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control ">
                            <?= $form->field($model, 'rememberMe')->checkbox([
                                'class' => '', 'id' => ''
                            ])->label('Remember me', ['class' => '', 'for' => 'defaultLoginFormRemember']) ?>
                        </div>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                <!-- Register -->
                <p>Not a member?
                    <a href="">Register</a>
                </p>


                <?php ActiveForm::end(); ?>
                <!-- Default form login -->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </section>
    <!--Section: Content-->
</div>
