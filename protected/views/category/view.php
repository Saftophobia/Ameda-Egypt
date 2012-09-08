<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'Create Category', 'url'=>array('create')));
	array_push($this->menu,	array('label'=>'Manage Category', 'url'=>array('admin')));
}
array_push($this->menu,array('label'=>'Create Thread', 
                             'url'=>array('thread/create','cid'=>$model->id)));
?>

<h1><?php echo $model->name; ?> Category </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'user_id',
	),
)); ?>

<br> <h1>Related Threads</h1>
<?php $this->widget('zii.widgets.CListView', array( 'dataProvider'=>$threadDataProvider, 'itemView'=>'/thread/_view',
)); ?>
