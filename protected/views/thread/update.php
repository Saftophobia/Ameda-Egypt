<?php
/* @var $this ThreadController */
/* @var $model Thread */

$this->breadcrumbs=array(
	'Threads'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
$cid=Thread::model()->findByPk($model->id)->category_id;
$this->menu=array(
	array('label'=>'Create Thread', 'icon'=>'pencil','url'=>array('create','cid'=>$cid)),
	array('label'=>'View Thread','icon'=>'flag' ,'url'=>array('view', 'id'=>$model->id,'cid'=>$cid)),
);
?>

<h1>Update Thread <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>