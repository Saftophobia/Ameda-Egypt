<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array();
if(Yii::app()->user->id==$model->id)
{
	array_push($this->menu,array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)));
}
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'info',
		'first_name',
		'last_name',
		'email',
		'confirmed_email',
		'username',
		'password',
		'dob',
		'date_joined',
		'picture_path',
	),
)); ?>
