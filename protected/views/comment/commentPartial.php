<?php
$count = count($dataProvider->data);
$data=$dataProvider->data;
for($i=0; $i<$count; $i++):
$user=User::model()->findByPk($data[$i]->user_id); 
?>
<table style="margin:0px;">
<caption style="text-align:left;background-color: #00547A;color:white;">
<?php echo $data[$i]->created_at;?>
</caption>
<tr >
<td style="word-wrap:break-word;max-width:200px;min-width:200px;background-color:#e9e9e9 ;vertical-align:top;width: 200px; height: 150px;">
<div style='color: black;font-size:12px;text-align: left;'>
<div style="text-align:center;margin-top:20px">


	
<?php if($user->getFileUrl('normal')!= null): ?>
<a href=<?php echo $user->getFileUrl('large')?> ><?php echo CHtml::image($user->getFileUrl('normal')); ?></a> 

<?php endif?>



<?php

	
	if(is_null($user->getFileUrl('normal')))
	{
		echo CHtml::image('images/defaults/noimg.gif',' No image available');
	
	}

	?>
</div>
<br/ >
<div style="font-size: 30px; font-weight:bold;text-align:center ">
<?php echo CHtml::link($user->username,array('/user/view','id'=>$data[$i]->user_id)); ?>
</div>
<br/>
<br/>
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
<td style="word-wrap:break-word;max-width:400px;min-width:400px;vertical-align:top;text-align:left;color:black;width: 400px; height: 150px;">
<hr />
<div style="font-size:25px;">
<?php echo $data[$i]->content; ?>
</div>
</td>
</tr>
</table>

<?php endfor; ?>

