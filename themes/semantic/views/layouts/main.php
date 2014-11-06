<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es"><head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="es" />

  <!-- Site Properities -->
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/ubb.ico">

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/semantic.css">

  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/views/layouts/main.css">

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/semantic.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/semantic.min.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/menu.js"></script>
  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/views/layouts/main.js"></script>

</head>
<body id="home">

<div class="ui tiered inverted menu">
  <div class="menu">
    <a class="active item" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">
      <i class="home icon"></i>
      Inicio
    </a>
    
    <?php if(Yii::app()->user->isGuest){ ?>

    <a class="item" href="<?php echo Yii::app()->user->ui->loginUrl; ?>" >
      <i class="grid layout icon"></i> Iniciar Sesión
    </a>
    
    <?php } ?>




    <div class="right menu">
      <div class="item">
        <div class="ui icon input">
          

    <?php if(!Yii::app()->user->isGuest){ ?>

    <a class="item" href="<?php echo Yii::app()->user->ui->logoutUrl; ?>" >
      <i class="mail icon" ></i> Cerrar Sesión
    </a>
    <?php } ?>



        </div>
      </div>
    </div>
  </div>







 <?php if(!Yii::app()->user->isGuest){ ?>
  <div class="ui sub menu">
    <a class="active item" href="<?php echo Yii::app()->user->ui->userManagementAdminUrl; ?>">Administrar Usuarios</a>
    <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes">Gestión de Donantes</a>
    <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionsangre">Donación Sangre</a>
  </div>
  <?php }  ?>
</div>

  <?php echo $content; ?>



 
  <div class="ui page grid stackable segment">
    <div class="row">
      <div class="column">
        <h1 class="center aligned ui header">
          Many Companies Rely on Our Cat Knowledge
        </h1>
        <div class="ui horizontal divider"><i class="heart icon"></i></div>
      </div>
    </div>
    <div class="center four column aligned row">
      <div class="column">
        <div class="ui text shape">
          <div class="sides">
            <div class="active side">
              <i class="huge circular github icon"></i>
            </div>
            <div class="side">
              <i class="huge circular facebook icon"></i>
            </div>
            <div class="side">
              <i class="huge circular maxcdn icon"></i>
            </div>
            <div class="side">
              <i class="huge circular pinterest icon"></i>
            </div>
            <div class="side">
              <i class="huge circular weibo icon"></i>
            </div>
            <div class="side">
              <i class="huge circular flickr icon"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="ui text shape">
          <div class="sides">
            <div class="side">
              <i class="huge circular github icon"></i>
            </div>
            <div class="side">
              <i class="huge circular facebook icon"></i>
            </div>
            <div class="active side">
              <i class="huge circular maxcdn icon"></i>
            </div>
            <div class="side">
              <i class="huge circular pinterest icon"></i>
            </div>
            <div class="side">
              <i class="huge circular weibo icon"></i>
            </div>
            <div class="side">
              <i class="huge circular flickr icon"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="ui text shape">
          <div class="sides">
            <div class="side">
              <i class="huge circular github icon"></i>
            </div>
            <div class="side">
              <i class="huge circular facebook icon"></i>
            </div>
            <div class="side">
              <i class="huge circular maxcdn icon"></i>
            </div>
            <div class="side">
              <i class="huge circular pinterest icon"></i>
            </div>
            <div class="active side">
              <i class="huge circular weibo icon"></i>
            </div>
            <div class="side">
              <i class="huge circular flickr icon"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="ui text shape">
          <div class="sides">
            <div class="side">
              <i class="huge circular github icon"></i>
            </div>
            <div class="side">
              <i class="huge circular facebook icon"></i>
            </div>
            <div class="side">
              <i class="huge circular maxcdn icon"></i>
            </div>
            <div class="side">
              <i class="huge circular pinterest icon"></i>
            </div>
            <div class="side">
              <i class="huge circular weibo icon"></i>
            </div>
            <div class="active side">
              <i class="huge circular flickr icon"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <div class="ui inverted teal page grid segment">
    <div class="ten wide column">
      <div class="ui three column stackable grid">
        <div class="column">
          <div class="ui header">Courses</div>
          <div class="ui inverted link list">
            <a class="item">Registration</a>
            <a class="item">Course Calendar</a>
            <a class="item">Professors</a>
          </div>
        </div>
        <div class="column">
          <div class="ui header">Library</div>
          <div class="ui inverted link list">
            <a class="item">A-Z</a>
            <a class="item">Most Popular</a>
            <a class="item">Recently Changed</a>
          </div>
        </div>
        <div class="column">
          <div class="ui header">Community</div>
          <div class="ui inverted link list">
            <a class="item">BBS</a>
            <a class="item">Careers</a>
            <a class="item">Privacy Policy</a>
          </div>
        </div>
      </div>
    </div>
    <div class="six wide right floated aligned column">
      <h3 class="ui header">Contact Us</h3>
      <addr>
        237 Catberry Road <br>
        Milton Keynes, London <br>
      </addr>
      <p>(404) 867-5309</p>
    </div>
  </div>
</body>

</html>
