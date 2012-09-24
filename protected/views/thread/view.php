<?php
/* @var $this ThreadController */
/* @var $model Thread */

$this->breadcrumbs=array(
	'Category'=>array('/category/index'),
	Category::model()->findByPk($model->category_id)->name,
	$model->title,
);
$cid=Thread::model()->findByPk($model->id)->category_id;
$this->menu=array(
	array('label'=>'Create Thread', 'url'=>array('create','cid'=>$cid)),
);

if(Yii::app()->user->checkAccess('admin'))
{
	array_push($this->menu,array('label'=>'Lock Thread', 'url'=>array('#','cid'=>$cid), 'linkOptions'=>array('submit'=>array('lock','id'=>$model->id),'confirm'=>'Are you sure you want to lock this thread?')));
	array_push($this->menu,	array('label'=>'Manage Comments', 'url'=>array('/comment/admin','tid'=>$model->id)));
}
else
{
	if(Yii::app()->user->id == $model->user_id)
	{
		array_push($this->menu,array('label'=>'Lock Thread', 'url'=>array('#','cid'=>$cid), 'linkOptions'=>array('submit'=>array('lock','id'=>$model->id),'confirm'=>'Are you sure you want to lock this thread?')));

		array_push($this->menu,array('label'=>'Report Thread', 'url'=>array('#','cid'=>$cid), 'linkOptions'=>array('submit'=>array('report','id'=>$model->id),'confirm'=>'Are you sure you want to report this thread?')));
		
	}
}
?>


<table>
<caption style="text-align:left;background-color: #00547A;color:white;">
<?php echo $model->created_at?>
</caption>
<tr>
<td style="background-color:#e9e9e9 ;vertical-align:top;width: 100px; height: 270px;">
<div style="font-size: 30px; font-weight:bold; ">
<?php $user=User::model()->findByPk($model->user_id);?>
<br/>
<?php echo CHtml::image($user->getFileUrl('normal'),"User's image "); ?>

<br/>
<br/>
<?php echo CHtml::link($user->username,array('/user/view','id'=>$model->user_id)); ?>
</div>

<br/>
<div style='color: black;font-size:12px;text-align: left'>
Name: <?php echo $user->first_name;?> <?php echo $user->last_name;?>
<br/ >
<br/ >
Email: <?php echo $user->email;?>
<br/ >
<br/ >
Date Joined: <?php echo $user->date_joined;?>
<br/ >
<br/ >

</div>
</td>
<td style="vertical-align:top;text-align:left;color:black;width: 300px; height: 270px;">
<h3 style="font-size:15px;">
<?php echo $model->title; ?>
<br />
<hr />
</h3>

<div style="font-size:25px;">
<?php echo $model->content; ?>
</div>
</td>
</tr>
</table>

<br> <h1 style="font-size:40px;font-weight: bold;">Comments<hr/></h1>
<div id='comments'>
<?php $this->renderPartial('/comment/commentPartial',array('dataProvider'=>$commentDataProvider)); ?>
</div>
<br/>
<br/>
<br/>
<?php if(!$model->locked&&!User::model()->findByPk(Yii::app()->user->id)->locked):?>
<div style='font-size: 35px;font-weight: bold;'>
Leave a Comment:
<hr />
<br/>
<br/>
</div>
<div align='center'>
<?php echo CHtml::textArea('Comment','Write a comment...',array(
                                                'style'=>'resize: none;',
                                                'rows'=>12,
                                                'cols'=>70,
                                                'align'=>'center',
                                                'onfocus'=>'clearArea()',
                                                'id'=>'commenttextarea')); ?>
</div>
<?php else: if($model->locked):?>
<br/>
<br/>
<div style='font-size: 35px;font-weight: bold;text-align:center;'>
This Thread is CLOSED
<hr />
<br/>
<br/>
</div>
<?php else :?>
<br/>
<br/>
<div style='font-size: 35px;font-weight: bold;text-align:center;'>
You are BANNED due to offensive actions.
<hr />
<br/>
<br/>
</div>
<?php endif;?>
<?php endif;?>
<script>
function clearArea()
{
	var element=document.getElementById('commenttextarea');
 	if(element.value==("Write a comment..."))
 	{
 		element.value='';
 	}
}
</script>

<br/>
<br/>
<div align='right'>
<?php
    echo CHtml::ajaxLink(
                'Reply',
                $this->createUrl('/comment/create',array('tid'=>$model->id)),
                array(
                'type'=>'post',
	            'data'=>array('content'=>'js:$("#commenttextarea").val()'),
	            'dataType'=>'json',
	            'success'=>"function(data)
	            			{
	            				$('#comments').append(
		            				'<table style=margin:0px;>'+
'<caption style=text-align:left;background-color:#00547A;color:white;>'
+ data.created_at.toString()+
'</caption>'+
'<tr>'+
'<td style=background-color:#e9e9e9;vertical-align:top;width:100px;height:150px;>'+
'<div>'+
'<a href=x style=font-size:30px;font-weight:bold;>'+data.username+'</a>'+
'</div>'+
'<br />'+
'<br />'+

'<div style=color:black;font-size:12px;text-align:left>'+
'Name: '+data.first_name + ' '+data.last_name+
'<br />'+
'<br />'+
'Email: ' +data.email+
'<br />'+
'<br />'+
'Date Joined: ' + data.date_joined+
'<br />'+
'<br />'+
'</div>'+
'</td>'+
'<td style=vertical-align:top;text-align:left;color:black;width:300px;height:150px;>'+
'<hr />'+
'<div style=font-size:25px;>'+
data.content+
'</div>'+
'</td>'+
'</tr>'+
'</table>'
);
var url='';
var currenturl=window.location+'';
var len = currenturl.length;
for(var i=0; i<len;i++)
{
	url+=currenturl.charAt(i);
	if(currenturl.charAt(i)=='?')
	{
		break;
	}
}
$('a[href*=x]').each(function(){
  this.href = url+'r=user/view&id='+data.id;
});

	            				
	            				
	            			}",
	            	

                    ));
            ?>
</div>
