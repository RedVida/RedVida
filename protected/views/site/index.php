<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/s10.jpg">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/s11.jpg">
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