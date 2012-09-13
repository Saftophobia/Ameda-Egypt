<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'Edit Product', 'url'=>array('update', 'id'=>$model->id)));
	array_push($this->menu,array('label'=>'Create Product', 'url'=>array('create')));
}
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'video_path',
		'price',
		'available',
		'created_at',
		'updated_at',
	),
)); ?>

<?php 
$format = 'normal'; //'large' or 'thumb'
$path = $model->getFileUrl($format);



echo CHtml::image($path,"Product's image "); ?>

