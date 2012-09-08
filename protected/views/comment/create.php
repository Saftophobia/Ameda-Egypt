<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Create',
);

$this->menu=array(
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,	array('label'=>'Manage Comment', 'url'=>array('admin')));
}
?>

<h1>Create Comment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>