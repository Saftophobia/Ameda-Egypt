<?php
/* @var $this ProductController */
/* @var $model Product */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Products'=>'index.php?r=product/index','Create'),
));

?>

<h1>Create Product</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>