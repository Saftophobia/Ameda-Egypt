<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array();
if(Yii::app()->user->id==$model->id)
{
	array_push($this->menu,array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)));
}
?>

<h1><?php echo $model->first_name; ?> <?php echo $model->last_name; ?></h1>


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




<br />
<br />
<a href=<?php echo $model->getFileUrl('large')?> ><?php echo CHtml::image($model->getFileUrl('normal'),"User's image "); ?></a>
<br />

