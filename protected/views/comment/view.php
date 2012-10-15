<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Create Comment','icon'=>'pencil','url'=>array('create')),
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,	array('label'=>'Manage Comment','icon'=>'book' ,'url'=>array('admin')));
}
?>

<h1>View Comment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'thread_id',
		'content',
	),
)); ?>
