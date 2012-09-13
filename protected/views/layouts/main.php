<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),
				                     'visible'=>!Yii::app()->user->checkAccess('admin')),
				array('label'=>'Contact', 'url'=>array('/site/contact'),
				            'visible'=>!Yii::app()->user->checkAccess('admin')),
				array('label'=>'Products', 'url'=>array('/product/index')),
				array('label'=>'Forum', 'url'=>array('/category/index')),
				array('label'=>'Register', 'url'=>array('/user/create'),
				                'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Admin', 'url'=>array('/admin'),
				                'visible'=>Yii::app()->user->checkAccess('admin')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
         <a href="https://www.facebook.com/pages/OptimaEgypt/235389403207417">
         <img src="http://png-3.findicons.com/files/icons/2184/hand_drawn_social/64/facebook.png" /> </a>
         
	<div id="footer">
	<?php if(!Yii::app()->user->isGuest):?>
	    <?php 
	    $models=Category::model()->findAll();
	    $list = CHtml::listData($models,'id', 'name');
        echo CHtml::dropDownList('category', false, $list, 
                                             array('id'=>'forumddl',
                                                   'empty' =>array(0=>'Select a Category'),
                                                   'style'=>'width: 400px;',
                                                   'selected'=>'0',
                                                   'onchange'=>'redirectToCategory()',
                                                   ));
	    ?>
		<br/>


		<script>
		function redirectToCategory()
		{
			var url="";
			var all=window.location+"";
			for(var i=0;i<all.length;i++)
			{
				url+=all.charAt(i);
				if(all.charAt(i)=='?')
				{
					break;
				}
				
			}
			if(url.charAt(url.length-1)!='?')
			{
				url+='?';
			}
			window.location=url+"r=category/view&id="+
			                document.getElementById('forumddl').value;
		}
		</script>
<?php endif;?>


		Copyright &copy; <?php echo date('Y'); ?> TeraSoft.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
