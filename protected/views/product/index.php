<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Products'),
));

$this->menu=array();
if(Yii::app()->user->checkAccess('admin'))
{
    array_push($this->menu,array('label'=>'Manage Products', 'icon'=>'book', 'url'=>array('admin')));
    array_push($this->menu,array('label'=>'Create Product', 'icon'=>'pencil', 'url'=>array('create')));
   

}
?>

<h1>Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>



