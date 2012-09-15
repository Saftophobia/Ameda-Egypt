<?php
$count = count($dataProvider->data);
$data=$dataProvider->data;
for($i=0; $i<$count; $i++):
$user=User::model()->findByPk($data[$i]->user_id); 
?>
<table>
<caption style="text-align:left;background-color: #00547A;color:white;">
<?php echo $data[$i]->created_at;?>
</caption>
<tr>
<td style="background-color:#e9e9e9 ;vertical-align:top;width: 100px; height: 350px;">
<div style="font-size: 30px; font-weight:bold; ">
<?php echo CHtml::link($user->username,array('/user/view','id'=>$data[$i]->user_id)); ?>
</div>
<br/>
<br/>
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
<td style="vertical-align:top;text-align:left;color:black;width: 300px; height: 350px;">
<hr />

<div style="font-size:25px;">
<?php echo $data[$i]->content; ?>
</div>
</td>
</tr>
</table>

<?php endfor; ?>

