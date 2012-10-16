<?php
/* @var $this UserController */
/* @var $model User */
?>

<div class="view">
<div class="row-fluid">
	<div class="span8">


	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('info')); ?>:</b>
	<?php echo CHtml::encode($data->info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	</div>


	<div class="span4">
	
<?php
	if(User::returnimageslocation($data->id) != null)
	{
		echo CHtml::image(User::returnimageslocation($data->id));
	}else
	{
		echo CHtml::image('images/defaults/noimg.gif',' No image available');
	
	}

	?>




	</div>
	


	 
</div>
</div>