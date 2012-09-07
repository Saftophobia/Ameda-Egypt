<?php
/* @var $this ThreadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Threads',
);

$this->menu=array(
	array('label'=>'Create Thread', 'url'=>array('create')),
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'Manage Thread', 'url'=>array('admin')));
}
?>

<h1>Threads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
