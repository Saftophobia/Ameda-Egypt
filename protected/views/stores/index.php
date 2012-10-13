<?php
/* @var $this StoresController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Stores'),
));


$this->menu=array();
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'Manage Stores', 'icon'=>'book', 'url'=>array('admin')));
    array_push($this->menu,array('label'=>'Create Store', 'icon'=>'pencil', 'url'=>array('create')));
   
}
?>

<h1>Stores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
