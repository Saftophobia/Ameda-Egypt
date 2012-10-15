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
       // '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Hot Topics', 'url'=>'index.php?r=thread/HotTopics'),  
                array('label'=>'Forums', 'url'=>'index.php?r=category/index'),
                '---',
                 array('label'=>'Admin', 'visible'=>Yii::app()->user->checkAccess('admin'), 'items' =>array( 
                    array('label'=>'Manage Products', 'url'=>'index.php?r=product/admin'),
                    array('label'=>'Manage Stores', 'url'=>'index.php?r=stores/admin'),
                    array('label'=>'Manage Categories', 'url'=>'index.php?r=category/admin'),
                    array('label'=>'Manage Users', 'url'=>'index.php?r=user/admin'),
                    


                  )),

                array('label'=>'Login','visible'=>Yii::app()->user->isGuest, 'items'=>array(
                    array('label'=>'Login', 'url'=>'index.php?r=site/login'),
                    array('label'=>'Register', 'url'=>'index.php?r=user/create'),
                    '---',
                    array('label'=>'About', 'url'=>'index.php?r=site/page&view=about'),
                    array('label'=>'Contact Us', 'url'=>'index.php?r=site/contact'),
                   	
                     
                )),

                array('label'=>'Welcome, ' .Yii::app()->user->name ,'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                    array('label'=>'Profile', 'url'=>'index.php?r=user/view&id='.Yii::app()->user->id),
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
<br/>
<br/>
	

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
	  
</br></br></br></br></br>

	<div id="footer">
  <div align="center">
  <hr/>
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
      </div>
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


<div class="row-fluid">
  <div class="span4 offset1">

   <b>Product Categories</b>
</br>
    Breast Pumps</br>
    Breast Pump Accessories</br>
    Milk Collection</br>
    Breast Care</br>
    Spare Parts</br>
</br></br>
<b>Product Categories</b>
</br>
    Breast Pumps</br>
    Breast Pump Accessories</br>
    Milk Collection</br>
    Breast Care</br>
    Spare Parts</br>

</div>





<div class="span4 offset2">


  <iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Gloria+Jean's+Coffee,+Giza,+Egypt&amp;aq=0&amp;oq=gloria+jeans+giza&amp;sll=37.0625,-95.677068&amp;sspn=37.546691,82.265625&amp;ie=UTF8&amp;hq=Gloria+Jean's+Coffee,&amp;hnear=Giza,+Al+Omraneyah,+Giza,+Egypt&amp;ll=30.054397,31.1765&amp;spn=0.117511,0.484973&amp;t=m&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Gloria+Jean's+Coffee,+Giza,+Egypt&amp;aq=0&amp;oq=gloria+jeans+giza&amp;sll=37.0625,-95.677068&amp;sspn=37.546691,82.265625&amp;ie=UTF8&amp;hq=Gloria+Jean's+Coffee,&amp;hnear=Giza,+Al+Omraneyah,+Giza,+Egypt&amp;ll=30.054397,31.1765&amp;spn=0.117511,0.484973&amp;t=m" style="color:#0000FF;text-align:left">View Larger Map</a></small>




</div>


</div>

</br>


<div align="center">
	<div class="clear"></div>
         <a href="https://www.facebook.com/pages/OptimaEgypt/235389403207417">
         <img src="http://png-3.findicons.com/files/icons/2184/hand_drawn_social/64/facebook.png" /> </a>
       </br>
		Copyright &copy; <?php echo date('Y'); ?> TeraSoft.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>

    </div>   
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
