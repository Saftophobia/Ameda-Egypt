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




<?php /*$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
        array('label'=>'LIST HEADER'),
        array('label'=>'Home', 'icon'=>'home', 'url'=>'#'),
        array('label'=>'Library', 'icon'=>'book', 'url'=>'#'),
        array('label'=>'Application', 'icon'=>'pencil', 'url'=>'#'),
        array('label'=>'ANOTHER LIST HEADER'),
        array('label'=>'Profile', 'icon'=>'user', 'url'=>'#'),
        array('label'=>'Settings', 'icon'=>'cog', 'url'=>'#'),
        array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
    ),
)); */?>


