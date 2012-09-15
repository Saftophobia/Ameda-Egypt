<?php
/* @var $this SiteController */

$this->pageTitle="Ameda Egypt";
?>

<h1>AMEDA...</h1>

<p>Ameda breastfeeding products have been serving the needs of Mothers and babies for well over 50 years.</p>

<p>We know how much breastfeeding matters to you and your baby.</p>

<p>Our website aims to provide education and information for breastfeeding Mothers and to support them in their efforts to provide precious breast milk to their babies for as long as they wish.  At times this may require the assistance of a quality breast pump or breastfeeding accessory and these can be found within this website.</p>

<p>If you have been referred to this site you can now go to the On-Line shop to order your pump or accessory.</p>




<p>If you are not sure of the product you require please access the <a href="index.php?r=Product"> Product List</a>.</p>




<br/>
<br/>
<br/>


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

