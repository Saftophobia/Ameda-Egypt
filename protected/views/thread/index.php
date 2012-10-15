<?php
/* @var $this ThreadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Threads',
);
$cid=Thread::model()->findByPk($model->id)->category_id;
$this->menu=array(
	array('label'=>'Create Thread','icon'=>'pencil', 'url'=>array('create','cid'=>$cid)),
);
?>

<h1>Threads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
