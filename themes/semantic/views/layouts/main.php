<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es">

<head>

  <!-- Standard Meta -->
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="es" />

  <!-- Site Properities -->
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/carousel.css">
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/ubb.ico">
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/views/layouts/main.css">   
  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <script src="//code.jquery.com/jquery-latest.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/carousel.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/semantic.min.js"></script>  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/views/layouts/main.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/menu.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/jquery.tablesort.js"></script>


</head>
<body id="home">
<div class="ui center aligned segment">
<img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/clinica3.jpg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/text.png">
</div>



<script type="text/javascript">
// THIS SCRIPT DETECTS THE ACTIVE ELEMENT AND ADDS ACTIVE CLASS
// VER CAMBIA PERO NO SE MANTIENE AL REDIRECCIONAR
  $(document).ready(function(){
    var pathname = window.location.pathname,
      page = pathname.split(/[/ ]+/).pop(),
      menuItems = $('#main_menu');
    menuItems.each(function(){
      var mi = $(this),
        miHrefs = mi.attr("href"),
        miParents = mi.parents('i');
      if(page == miHrefs) {
        miParents.addClass("active").siblings().removeClass('active');
      }
    });
  });

</script>


<div id="main_menu" class="ui blue inverted menu ">
  <div class="menu">

    <a class="active red item" href="<?php echo Yii::app()->request->baseUrl; ?>">
      <i class="home icon"></i>Inicio
    </a>

    <?php if(Yii::app()->user->isGuest){ ?>
    <a class="item" href="<?php echo Yii::app()->user->ui->loginUrl; ?>">
      <i class="user icon"></i> Iniciar Sesión
    </a>
    <?php } ?>

    <div class="right menu">
      <div class="item">
        <div class="ui icon input">

    <?php if(!Yii::app()->user->isGuest){ ?>
    <a class="item" href="<?php echo Yii::app()->user->ui->logoutUrl; ?>" >
      <i class="off icon" ></i> Cerrar Sesión
    </a>
    <?php } ?>

        </div>
      </div>
    </div>
  </div>


 <?php if(!Yii::app()->user->isGuest){ ?>
<div class="ui blue inverted menu">
  <div class="menu">
    <a class="active item" href="<?php echo Yii::app()->user->ui->userManagementAdminUrl; ?>">
      <i class="circle icon"></i> Administracion de Usuario
    </a>
    <div class="ui pointing dropdown link item">

      <i class="circle icon"></i> Gestión de Donaciones <i class="dropdown icon"></i>
      <div class="menu">
        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionsangre/admin">
          <i class="doble angle right icon"></i> Adm. Donaciones de Sangre
        </a>
        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionmedula/admin">
          <i class="doble angle right icon"></i> Adm. Donaciones de Medula
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionorgano/admin">
          <i class="doble angle right icon"></i> Adm. Donaciones de Organo
        </a>    

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/bancosangre/admin">
          <i class="doble angle right icon"></i> Administrar Banco de Sangre
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/organo/admin">
          <i class="doble angle right icon"></i> Administrar de Organos
        </a>

        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/donar">
          <i class="doble angle right icon"></i> Registrar Donación 
        </a>

       </div>
       
    </div>
        

      
        

    <div class="ui pointing dropdown link item">

      <i class="circle icon"></i> Gestión de Donantes <i class="dropdown icon"></i>
      <div class="menu">
         


        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/create">
          <i class="doble angle right icon"></i> Registrar Donante
        </a>


         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/admin">
          <i class="doble angle right icon"></i> Administrar de Donantes
        </a>


        
    
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/registraenfermedad">
          <i class="doble angle right icon"></i> Asignar Enfermedad 
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/registra_alergia">
          <i class="doble angle right icon"></i> Asignar Alergia 
        </a>


       </div>
       
    </div>







    <div class="ui pointing dropdown link item">

      <i class="circle icon"></i> Gestión de Pacientes <i class="dropdown icon"></i>
      <div class="menu">
         
         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/index">
          <i class="doble angle right icon"></i> Lista Pacientes
        </a>


        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/create">
          <i class="doble angle right icon"></i> Registrar Paciente
        </a>


         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/admin">
          <i class="doble angle right icon"></i> Administrar de Pacientes
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/urgenciasnacionales">
          <i class="doble angle right icon"></i> Urgencias Nacionales
        </a>


       </div>
       
    </div>




        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centromedico">
          <i class="circle icon"></i>Gestión Centros
        </a>


  </div>




</div>

 <?php }  ?>


</div>
<div class="contenido">
  



  <?php echo $content; ?>

</div>


</body>

</html>