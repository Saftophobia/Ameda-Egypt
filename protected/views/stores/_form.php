<?php
/* @var $this StoresController */
/* @var $model Stores */
/* @var $form CActiveForm */
?>

<div class="form">


<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'stores-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'well'),
)); ?>




	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class'=>'span3','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phonenumber'); ?>
		<?php echo $form->textArea($model,'phonenumber',array('class'=>'span3','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'phonenumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textArea($model,'fax',array('class'=>'span3','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('class'=>'span3','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('class'=>'span3','size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save')); ?>



<?php $this->endWidget(); ?>

</div><!-- form -->