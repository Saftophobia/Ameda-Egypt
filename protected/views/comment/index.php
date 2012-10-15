<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comments',
);

$this->menu=array(
	array('label'=>'Create Comment','icon'=>'pencil', 'url'=>array('create')),
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,	array('label'=>'Manage Comment', 'icon'=>'book','url'=>array('admin')));
}
?>

<h1>Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
