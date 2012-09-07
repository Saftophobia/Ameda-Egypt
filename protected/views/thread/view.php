<?php
/* @var $this ThreadController */
/* @var $model Thread */

$this->breadcrumbs=array(
	'Threads'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Create Thread', 'url'=>array('create')),
);

if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'List Thread', 'url'=>array('index')));
	array_push($this->menu,array('label'=>'Update Thread', 'url'=>array('update', 'id'=>$model->id)));
	array_push($this->menu,array('label'=>'Delete Thread', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')));
	array_push($this->menu,	array('label'=>'Manage Thread', 'url'=>array('admin')));
	array_push($this->menu,array('label'=>'Lock Thread', 'url'=>'#', 'linkOptions'=>array('submit'=>array('lock','id'=>$model->id),'confirm'=>'Are you sure you want to lock this thread?')));
}
else
{
	if(Yii::app()->user->id == $model->user_id)
	{
			array_push($this->menu,array('label'=>'Lock Thread', 'url'=>'#', 'linkOptions'=>array('submit'=>array('lock','id'=>$model->id),'confirm'=>'Are you sure you want to lock this thread?')));
	}
}
?>

<h1>View Thread #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'category_id',
		'title',
		'created_at',
		'updated_at',
		'content',
		'locked',
	),
)); ?>
