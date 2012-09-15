<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'Create Category', 'url'=>array('create')));
	array_push($this->menu,	array('label'=>'Manage Threads', 'url'=>array('/thread/admin','cid'=>$model->id)));
}
array_push($this->menu,array('label'=>'Create Thread', 
                             'url'=>array('thread/create','cid'=>$model->id)));
?>

<h1><?php echo $model->name; ?></h1>


<div>

<table >


<tr  style="background:white url(css/bg.gif);">

<th>
Thread
</th>

<th >
Last Comment
</th>

<th>
Total Comment
</th>
</tr>


<?php
$threads=$threadDataProvider->data;
$allThreads=count($threads);
for($i=0;$i<$allThreads;$i++):
$totalComments=Comment::model()->findAllByAttributes(array('thread_id'=>$threads[$i]->id));
$countComments=count($totalComments);
$lastUser=User::model()->findByPk($totalComments[$countComments-1]->user_id);
?>
	<tr >


	<td style="background-color:#e9e9e9;font-weight: bold; text-decoration: none; ">
	<?php echo CHtml::link(CHtml::encode($threads[$i]->title), 
	             array('thread/view', 'id'=>$threads[$i]->id)); ?>
	<br />
	</td>
	<td style="font-weight: bold;font-size: x-small;">

	<?php if($countComments>0): ?>
	<?php echo CHtml::encode($totalComments[$countComments-1]->content);?>
	<br />
	by: <?php echo CHtml::link($lastUser->username,array('/user/view','id'=>$lastUser->id));?>
	<br/>
	at: <?php echo CHtml::encode($totalComments[$countComments-1]->created_at);?>

	<?php else: echo "No Comments";?>
	<?php endif;?>

	</td>

	<td style="background-color:#e9e9e9;font-weight: bold;">
	<?php echo CHtml::encode($countComments); ?>
	<br />
	</td>


	</tr>
<?php endfor;?>

</table>

</div>

