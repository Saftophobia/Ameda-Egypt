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

  <div id="fb-root"></div>


<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


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
       
  
 ' <a class="pull-right" href="https://www.facebook.com/pages/Optima-Egypt/235389403207417"> <img alt="f"
                                        src="http://www.teradata.com/Images/facebook_icon.png" 

                                        style="height:15px; margin-top: 77%;">
                                </a> ',

                                ' <a class="pull-right" href="https://twitter.com/AMS_Sanad"> <img alt="t"
                                        src="http://2.bp.blogspot.com/-AuhT5FmpzvM/T6qAbDwQrFI/AAAAAAAAOyM/5PFxvxqNFsM/s1600/twitter_icon+%281%29.jpg" 

                                        style="height:20px; margin-top: 33%;margin-right:30%">
                                </a> ',

                                

' <a class="pull-right" href="http://www.google.co.uk/#hl=en&sclient=psy-ab&q=Ameda+Breastfeeding&oq=Ameda+Breastfeeding&gs_l=hp.3..0l4.8597.29603.0.29736.31.17.4.7.7.5.713.5328.2-11j3j2j0j1.17.0.les%3B..0.0...1c.1.BzeR-_czNYQ&pbx=1&bav=on.2,or.r_gc.r_pw.r_qf.&fp=4df528e4659d284e&bpcl=35277026&biw=1317&bih=643"> <img alt="g"
                                        src="http://icons.iconarchive.com/icons/deleket/social-bookmark/24/Google-icon.png" 

                                        style="height:15px; margin-top: 55%; margin-right:30%">
                                </a> ',




    
//'<div> <a href="https://twitter.com/amssanad" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @amssanad</a></div>',
  
//'<div style = "margin-top:1%" class="fb-like" data-href="https://www.facebook.com/pages/Optima-Egypt/235389403207417" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>',
        
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
	  
</br>
 
	<div id="footer">
<hr/>
  <div align="center">
  
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
<div style="margin-bottom:10px">
<div class="fb-like" data-href="https://www.facebook.com/pages/Optima-Egypt/235389403207417" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial"></div>
</div>
</div>


<div align="center">
  <div class="clear"></div>
     </br>
		Copyright &copy; <?php echo date('Y'); ?> TeraSoft.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>

    </div>   
	</div><!-- footer -->

</div><!-- page -->
</div>
</body>
</html>
