<?php
/* @var $this StoresController */
/* @var $model Stores */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Stores'=>'index.php?r=stores/index', $model->name),
));

$this->menu=array(
	array('label'=>'List Stores', 'icon'=>'flag', 'url'=>array('index')),
    
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'Edit Store', 'icon'=>'book', 'url'=>array('update', 'id'=>$model->id)));
    }
?>






<h1><?php echo $model->name; ?></h1>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'phonenumber',
		'fax',
		'address',
		'email',
		
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
		'id',
		'name',
		'phonenumber',
		'fax',
		'address',
		'email',


    ),
)); ?>

