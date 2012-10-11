
<div style="  margin-left:auto;
         margin-right:auto;
         width:80%;">
<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Error'),
));
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>

</div>