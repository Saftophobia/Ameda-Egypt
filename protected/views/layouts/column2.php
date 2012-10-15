<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="row-fluid">

		<div class="span8 offset1" >
		<?php echo $content; ?>
		</div><!-- content -->

		<div class="span3">
		<?php $this->widget('bootstrap.widgets.TbMenu', array(
    	'type'=>'list',
    	'items'=>$this->menu,
		)); 
		?>
		</div><!-- sidebar -->
</div >

<?php $this->endContent(); ?>