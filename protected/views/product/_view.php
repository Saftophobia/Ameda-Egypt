<?php
/* @var $this ProductController */
/* @var $model Product */
?>

<div class="view">
<div class="row-fluid">
	<div class="span8">


	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('available')); ?>:</b>
	<?php 
	if($data->available == '1')
	{
		echo CHtml::encode('Available at stores');
	}else
	{
		echo CHtml::encode('Out of stock');
	}

	?>
	<br />

	


	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />
	<br />
</div>
<div class="span4">

	<?php echo CHtml::image(Product::returnimageslocation($data->id)," No image available"); ?>
	<br />

</div>
</div>
</div>