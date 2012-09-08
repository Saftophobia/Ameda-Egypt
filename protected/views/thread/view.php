<?php
/* @var $this ThreadController */
/* @var $model Thread */

$this->breadcrumbs=array(
	'Category'=>array('/category/index'),
	Category::model()->findByPk($model->id)->name,
	$model->title,
);
$cid=Thread::model()->findByPk($model->id)->category_id;
$this->menu=array(
	array('label'=>'Create Thread', 'url'=>array('create','cid'=>$cid)),
);

if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'Lock Thread', 'url'=>array('#','cid'=>$cid), 'linkOptions'=>array('submit'=>array('lock','id'=>$model->id),'confirm'=>'Are you sure you want to lock this thread?')));
	array_push($this->menu,	array('label'=>'Manage Comments', 'url'=>array('/comment/admin','tid'=>$model->id)));
	array_push($this->menu,	array('label'=>'reply', 'url'=>array('/comment/create','tid'=>$model->id)));
}
else
{
	if(Yii::app()->user->id == $model->user_id)
	{
			array_push($this->menu,array('label'=>'Lock Thread', 'url'=>array('#','cid'=>$this->_category->id), 'linkOptions'=>array('submit'=>array('lock','id'=>$model->id),'confirm'=>'Are you sure you want to lock this thread?')));
	}
}
?>

<h1><?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'category_id',
		'title',
		'created_at',
		'updated_at',
		'content',
		'locked',
	),
)); ?>

<br> <h1>Comments</h1>
<?php $this->widget('zii.widgets.CListView', array( 'dataProvider'=>$commentDataProvider, 'itemView'=>'/comment/_view',
)); ?>
