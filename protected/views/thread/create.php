<?php
/* @var $this ThreadController */
/* @var $model Thread */

$this->breadcrumbs=array(
	'Threads'=>array('index'),
	'Create',
);
?>

<h1>Create Thread</h1>

<?php echo $this->renderPartial('_formCreate', array('model'=>$model)); ?>