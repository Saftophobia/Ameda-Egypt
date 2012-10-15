<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Comment','icon'=>'pencil', 'url'=>array('create')),
	array('label'=>'View Comment','icon'=>'flag', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Comment', 'icon'=>'book','url'=>array('admin')),
);
?>

<h1>Update Comment <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>