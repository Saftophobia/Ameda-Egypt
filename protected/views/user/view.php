<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username,
);

$this->menu=array();
if(Yii::app()->user->id==$model->id)
{
	array_push($this->menu,array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)));
}
?>

<h1><?php echo $model->first_name; ?> <?php echo $model->last_name; ?></h1>
<div>
<a href=<?php echo $model->getFileUrl('large')?> ><?php echo CHtml::image($model->getFileUrl('normal'),"User's image "); ?></a>
</div>
<br />
<br />
<br />
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'first_name',
		'last_name',
		'email',
		'info',
		'dob',
		'date_joined',
	),
)); ?>




