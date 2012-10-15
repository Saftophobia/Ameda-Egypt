
<div style="width: 125%">
<?php





$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array('Hot Topics'),
));



?>
</div>

<h1>Hot Topics</h1>

<div style="width: 125%">
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped condensed',
    'dataProvider'=>$gridDataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'title',  'value' => 'CHtml::link("$data->title", "index.php?r=thread/view&id=".$data->id)',
        'type'  => 'raw',

        ),
        
    ),
)); ?>


</div>


