<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),

)); */
?>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'well' , 'enctype'=>'multipart/form-data' ),
)); ?>



	
	

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200 , 'class'=>'span3' )); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'productImage'); ?>
		<?php echo $form->fileField($model,'productImage', array('class'=>'span3'));?>
		<?php echo $form->error($model,'productImage'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'video_path'); ?>
		<?php echo $form->textField($model,'video_path', array('class'=>'span3')); ?>
		<?php echo $form->error($model,'video_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price', array('class'=>'span3')); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'available'); ?>
		<?php echo $form->dropDownList($model,'available', $model->getAvailableOptions() ,array('class'=>'span3')); ?>
		<?php echo $form->error($model,'available'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php echo $form->textArea($model,'info',array('class'=>'span3' , 'rows'=>6, 'cols'=>50 , "style"=>"color: orange;")); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

	




	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save')); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->