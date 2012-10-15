<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Forum',
);
if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'Create Category','icon'=>'flag', 'url'=>array('create')));
	array_push($this->menu,	array('label'=>'Manage Category','icon'=>'book', 'url'=>array('admin')));
}
?>

<h1 id = "cena">Categories</h1>
<div>

<table id = "categories" >


<tr id="headers" style="background:white url(css/bg.gif);">

<th id = "name">
Forum
</th>

<th id = "lastpost">
Last Post
</th>

<th id = "total">
Total Posts
</th>

</tr>


<?php for($i=0;$i<count($ids);$i++):?>
	<tr >


	<td style="background-color:#e9e9e9;font-weight: bold; text-decoration: none; ">
	<?php echo CHtml::link(CHtml::encode($names[$i]), 
	             array('view', 'id'=>$ids[$i]),array('id'=>'link')); ?>
	<br />
	</td>
	<td style="font-weight: bold;font-size: x-small;">

	<?php if($totalPosts[$i]>0): ?>
	<?php echo CHtml::link(CHtml::encode($lastPosts[$i]->title),array('thread/view','id'=>$lastPosts[$i]->id,'cid'=>$lastPosts[$i]->category_id));?>
	<br />
	by: <?php echo CHtml::link($usernames[$i],array('/user/view','id'=>$lastPosts[$i]->user_id));?>
	<br/>
	at: <?php echo CHtml::encode($lastPosts[$i]->created_at);?>

	<?php else: echo "No Posts";?>
	<?php endif;?>

	</td>

	<td style="background-color:#e9e9e9;font-weight: bold;">
	<?php echo CHtml::encode($totalPosts[$i]); ?>
	<br />
	</td>


	</tr>
<?php endfor;?>

</table>

</div>



