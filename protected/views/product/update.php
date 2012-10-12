<?php
/* @var $this ProductController */
/* @var $model Product */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Products'=>'index.php?r=product/index', $model->name=>'index.php?r=product/view&id='.$model->id,'Update'),
));

?>

<h1>Update <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>