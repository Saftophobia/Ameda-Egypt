<?php
/* @var $this StoresController */
/* @var $model Stores */

$this->breadcrumbs=array(
	'Stores'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Stores', 'url'=>array('index')),
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'Edit Stores', 'url'=>array('update', 'id'=>$model->id)));
	array_push($this->menu,array('label'=>'Create Stores', 'url'=>array('create')));
}
?>






<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'phonenumber',
		'fax',
		'address',
		'email',
		
	),
)); ?>
