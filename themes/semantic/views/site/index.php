
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/carousel.css">
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/carousel.js"></script>
 
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <center><img class="img-responsive" alt="Responsive image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/s10.jpg"></center>
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <center><img class="img-responsive" alt="Responsive image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/s11.jpg"></center>
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<script>
    $(document).ready(function(){
        $('.carousel').carousel({
            interval: 3000
        });
    });
</script>




