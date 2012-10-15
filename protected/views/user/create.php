<?php
/* @var $this UserController */
/* @var $model User */


$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Users'=>array('index'),
	'Create',),
));


$this->menu=array();
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'List User', 'url'=>array('index')));
}
?>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>