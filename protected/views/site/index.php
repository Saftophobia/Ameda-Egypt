<?php
/* @var $this SiteController */

$this->pageTitle="Ameda Egypt";
?>

</br>
</br>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'Ameda Egypt',
)); ?>
  </br>
  </br>
    <p>Our website aims to provide education and information for breastfeeding Mothers and to support them in their efforts to provide precious breast milk to their babies for as long as they wish.</p>
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Learn more',
        'url'=>'index.php?r=site/page&view=about',
        
    )); ?></p>
 
<?php $this->endWidget(); ?>





  
       <ul class="thumbnails">
    <li class="span4">
    <div class="thumbnail">

    <img src="http://www.ameda.com/sites/default/files/why_breastfeed.jpg" alt="">
   <h3>Ameda Products</h3>
    <p>Ameda provides the highest quality breastfeeding products and education. Our mission is to help empower mothers to meet their breastfeeding goals by providing products that make breastfeeding more comfortable and breast pumping easier. We know how much breastfeeding matters.</p>
    
 
    <div class="offset2">
   <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'View Products',
    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>'index.php?r=product/index',
    )); ?>
  </div>
    


    </div>
    </li>
   
    <li class="span4">
    
    <div class="thumbnail">
   
    <img src="http://www.ameda.com/sites/default/files/your_first_day_back-_0.jpg" alt="">
   <h3>The Daily Feed</h3>
    <p>Who better to shed light on what breastfeeding is really all about than real moms?
Learn and get advice from your fellow moms here - we're all in this together!</p>

 
    <div class="offset2">
   <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Hot Topics',
    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>'index.php?r=thread/HotTopics',
    )); ?>
  </div>


    </div>
    </li>
  
   <li class="span4">
    <div class="thumbnail">

    <img src="http://www.ameda.com/sites/all/themes/ameda/img/nurse.jpg" alt="">
    <h3>Healthcare Professionals</h3>
    <p>The Ameda Connections Program provides clinicians who support breastfeeding mothers with value-laden mailings of educational materials, special offers, and clinical information. Join now to receive exclusive mailings for you and your mothers.</p>
    
    <div class="offset2">
   <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Join now!',
    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>'index.php?r=user/create',
    )); ?>
  </div>
    </div>

    </li>
    

    </ul>





<br/>
<br/>
<br/>

<div class="row-fluid">
<div class = "offset2">

<?php
        $this->widget('ext.slider.slider', array(
            'container'=>'slideshow',
            'width'=>600, 
            'height'=>400, 
            'timeout'=>6000,
            'infos'=>true,
            'constrainImage'=>true,
            'images'=>Product::returnimages(),
            'alts'=>Product::returnproductname(),
            'urls'=>Product::returnproduct(),
            )
        );
 ?>
</div></div>