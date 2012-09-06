<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);

?>

<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>


<?php
$this->beginWidget('zii.widgets.CPortlet', array(
                   'title'=>'Operations',
		           ));
$this->menu=array(
	array('label'=>'Manage Users', 'url'=>array('/user/index')),
	array('label'=>'Manage Admins', 'url'=>array('manageAdmins')),
);
$this->widget('zii.widgets.CMenu', array(
                    'items'=>$this->menu,
	                 'htmlOptions'=>array('class'=>'operations'),
));
$this->endWidget();
?>

