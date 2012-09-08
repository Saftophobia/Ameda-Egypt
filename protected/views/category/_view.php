<?php
/* @var $this CategoryController */
/* @var $model Category */
?>

<div class="view">

	<b>Category</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />


</div>