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
	array_push($this->menu,array('label'=>'Create Product', 'url'=>array('create')));
	array_push($this->menu,array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->id)));
	array_push($this->menu,array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')));
	array_push($this->menu,	array('label'=>'Manage Product', 'url'=>array('admin')));
}
?>

<h1>View Product #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'name',
		'picture_path',
		'price',
		'available',
		'created_at',
		'updated_at',
	),
)); ?>
