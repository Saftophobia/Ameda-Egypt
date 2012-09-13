<?php
/* @var $this ProductController */
/* @var $model Product */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('available')); ?>:</b>
	<?php echo CHtml::encode($data->available); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_path')); ?>:</b>
        <!--<iframe width="560" height="315" src="<?php echo CHtml::encode($data->video_path); ?>" frameborder="0" allowfullscreen></iframe>
	--><br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />
	<br />
	<?php echo CHtml::image('images/products/img_'.$data->id," No image available"); ?>
	<br />


</div>