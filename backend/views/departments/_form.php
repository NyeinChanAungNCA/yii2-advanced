<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Companies;
use backend\models\Branches;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'companies_company_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
        'language' => 'en',
        'options' => [
            'prompt' => 'Select Company',
            'onchange' => '
                $.post( "index.php?r=branches/lists&id='.'"+$(this).val(), function(data){
                    $( "select#departments-branches_branch_id" ).html(data);
                });'
            ],
        'pluginOptions' => [
            'allowClear' => true
            ],
    ]); ?>

     <? //$form->field($model, 'companies_company_id')->dropDownList(
    //     ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
    //     [
    //         'prompt' => 'Select Company',
    //         'onchange' => '
    //             $.post( "index.php?r=branches/lists&id='.'"+$(this).val(), function(data){
    //                 $( "select#departments-branches_branch_id" ).html(data);
    //             });'
    //     ]); ?>

    <?= $form->field($model, 'branches_branch_id')->dropDownList(
        ArrayHelper::map(Branches::find()->all(),'branch_id','branch_name'),
        [
            'prompt' => 'Select Branch',
        ]); ?>

    <?//$form->field($model, 'branches_branch_id')->widget(Select2::classname(), [
    //     'data' => ArrayHelper::map(Branches::find()->all(),'branch_id','branch_name'),
    //     'language' => 'en',
    //     'options' => ['placeholder' => 'Select a branch ...'],
    //     'pluginOptions' => [
    //         'allowClear' => true
    //     ],
    // ]); ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_created_date')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'department_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
