<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'List User', 'url'=>array('index')));
}
?>

<h1><?php echo $model->first_name; ?> <?php echo $model->last_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>