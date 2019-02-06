<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Companies;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

    <? //$form->field($model, 'companies_company_id')->dropDownList(
    //     ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
    //     ['prompt' => 'Select Company'])->label("Company Name") ?>

    <?= $form->field($model, 'companies_company_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a company ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'branch_created_date')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'branch_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
