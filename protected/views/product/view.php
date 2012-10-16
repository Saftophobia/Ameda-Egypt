<?php
/* @var $this ProductController */
/* @var $model Product */
/*
$this->breadcrumbs=array(
	'Products'=>array('index'),

	$model->name,
);
*/

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Products'=>'index.php?r=product/index', $model->name),
));




$this->menu=array(
	array('label'=>'List Products', 'icon'=>'flag', 'url'=>array('index')),
    
);
if(Yii::app()->user->checkAccess('admin'))
{
	
	array_push($this->menu,array('label'=>'Edit Product', 'icon'=>'book', 'url'=>array('update', 'id'=>$model->id)));
        
}
?>

<h1><?php echo $model->name; ?></h1>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'video_path',
		'price',
		'available',
		'created_at',
		'updated_at',
		'info'
	),
)); */?>



<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	/*
    'data'=>array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'CSS'),
    'attributes'=>array(
        array('name'=>'firstName', 'label'=>'First name'),
        array('name'=>'lastName', 'label'=>'Last name'),
        array('name'=>'language', 'label'=>'Language'),
*/

        'data'=>$model,
	'attributes'=>array(
		'name',
		'video_path',
		'price',
		'available',
		'created_at',
		'updated_at',
		'info'


    ),
)); ?>



<br />
<br />
<br />


<?php if($model->getFileUrl('normal')!= null): ?>
<a href=<?php echo $model->getFileUrl('large')?> ><?php echo CHtml::image($model->getFileUrl('normal')); ?></a> 

<?php endif?>



<?php

	
	if(is_null($model->getFileUrl('normal')))
	{
		echo CHtml::image('images/defaults/noimg.gif',' No image available');
	
	}

	?>
	




<br />
<br />
<br />
<br />
<iframe width="560" height="315" src="<?php echo $model->video_path ?>" frameborder="0" allowfullscreen></iframe>