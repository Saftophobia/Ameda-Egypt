<?php
/* @var $this StoresController */
/* @var $model Stores */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Stores'=>array('index'), 'Create' ),
));


$this->menu=array(
	array('label'=>'Create Store', 'icon'=>'pencil', 'url'=>array('create')),
    
);
?>

<h1>Create Stores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>