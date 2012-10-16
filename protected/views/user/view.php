<?php
/* @var $this UserController */
/* @var $model User */


$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Users'=>array('index'), $model->username ),
));

$this->menu=array();
if(Yii::app()->user->id==$model->id)
{
	array_push($this->menu,array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)));
}
?>

<h1><?php echo $model->first_name; ?> <?php echo $model->last_name; ?></h1>
<div>

	
<?php if($model->getFileUrl('normal')!= null): ?>
<a href=<?php echo $model->getFileUrl('large')?> ><?php echo CHtml::image($model->getFileUrl('normal')); ?></a> 

<?php endif?>



<?php

	
	if(is_null($model->getFileUrl('normal')))
	{
		echo CHtml::image('images/defaults/noimg.gif',' No image available');
	
	}

	?>
	
</div>
<br />
<br />
<br />

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
		'username',
		'first_name',
		'last_name',
		'email',
		'info',
		'dob',
		'date_joined',


    ),
)); ?>

