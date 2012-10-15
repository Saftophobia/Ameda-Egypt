<?php
/* @var $this UserController */
/* @var $model User */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Users'=>'index.php?r=user/index','Manage'),
));

$this->menu=array();

if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'List User', 'url'=>array('index')));
	
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(

	'id'=>'user-grid',
	'ajaxUpdate'=>true,
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'template'=>"{items}",
    'filter'=>$model,
    'columns'=>array(
'id',
		'first_name',
		'last_name',
		'email',
		'username',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),

        array(
			"type"=>"raw",
			"value"=>'CHtml::ajaxLink(
				'.'$data->locked?'.'"UnBlock"'.':'.'"Block"'.',

				Yii::app()->createUrl("/user/delete",array("id"=>$data->id)),

				array(
				"data"=>array("id"=>$data->id),
				"type"=>"post",
				"dataType"=>"json",
				"success"=>"function(data)
							{
								alert(data.msg);
								if(data.state==true)
									document.getElementById(data.id).innerHTML='."'UnBlock'".';
								else
									document.getElementById(data.id).innerHTML='."'Block'".';
							}",
				),
					array(
					"id"=>'.'"$data->id"'.',
					)
					
				)',
				
			),

    ),
)); ?>



