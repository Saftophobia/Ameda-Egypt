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




		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>'Ameda Egypt',
    'brandUrl'=>'index.php?r=site/index',
    'collapse'=>false, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>'index.php?r=site/index'),
                array('label'=>'Products', 'url'=>'index.php?r=product/index'),
                array('label'=>'Stores', 'url'=>'index.php?r=stores/index'),
                
                /*array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                    array('label'=>'Action', 'url'=>'#'),
                    array('label'=>'Another action', 'url'=>'#'),
                    array('label'=>'Something else here', 'url'=>'#'),
                    '---',
                    array('label'=>'NAV HEADER'),
                    array('label'=>'Separated link', 'url'=>'#'),
                    array('label'=>'One more separated link', 'url'=>'#'),
                )),*/
            ),
        ),
        '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Forums', 'url'=>'index.php?r=category/index'),
                '---',
                 array('label'=>'Admin', 'url'=>'index.php?r=admin' , 'visible'=>Yii::app()->user->checkAccess('admin')),

                array('label'=>'Login', 'url'=>'#','visible'=>Yii::app()->user->isGuest, 'items'=>array(
                    array('label'=>'Login', 'url'=>'index.php?r=site/login'),
                    array('label'=>'Register', 'url'=>'index.php?r=user/create'),
                    '---',
                    array('label'=>'About', 'url'=>'index.php?r=site/page&view=about'),
                    array('label'=>'Contact Us', 'url'=>'index.php?r=site/contact'),
                   	
                     
                )),

                array('label'=>'Welcome, ' .Yii::app()->user->name ,'visible'=>!Yii::app()->user->isGuest, 'url'=>'#', 'items'=>array(
                    array('label'=>'Logout', 'url'=>'index.php?r=site/logout'),
                    '---',
                    array('label'=>'About', 'url'=>'index.php?r=site/page&view=about'),
                    array('label'=>'Contact Us', 'url'=>'index.php?r=site/contact'),
                   	
                     
                )),

                
            ),
        ),
    ),
)); ?>






<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->


	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
	  
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
<br/>
<br/>
<div align="center">
	<div class="clear"></div>
         <a href="https://www.facebook.com/pages/OptimaEgypt/235389403207417">
         <img src="http://png-3.findicons.com/files/icons/2184/hand_drawn_social/64/facebook.png" /> </a>
  	</div>   
		Copyright &copy; <?php echo date('Y'); ?> TeraSoft.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
