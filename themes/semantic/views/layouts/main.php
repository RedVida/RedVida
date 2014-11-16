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
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/views/layouts/main.css">   
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/modal.css">   
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/jquery.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/carousel.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/semantic.min.js"></script>  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/views/layouts/main.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/jquery.tablesort.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/modal.js"></script>

<script>
$(document).ready(function() {
$('.ui.small.modal').modal('attach events','#terms','show');
});
</script>
</head>

<body>
<div class="ui center aligned segment">
<img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/clinica3.jpg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/text.png">
</div>

<div class="ui blue inverted menu ui aligned left segment">
  <div class="menu">

    <a class="item" href="<?php echo Yii::app()->request->baseUrl; ?>">
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
  
    <a class="item" style="pointer-events:none">
      <i class="user icon"></i> 
      <?php echo Yii::app()->user->name; ?>
    </a>   

    <a class="item"  href="<?php echo Yii::app()->user->ui->logoutUrl; ?>" >
      <i class="off icon" ></i> Cerrar Sesión
    </a>
    <?php } ?>

        </div>
      </div>
    </div>
  </div>


 <?php if(!Yii::app()->user->isGuest){ ?>
<div class="ui blue inverted menu ">
  <div class="menu">
    <a class="item" href="<?php echo Yii::app()->user->ui->userManagementAdminUrl; ?>">
      <i class="asterisk icon"></i> Adm. de Usuario
    </a>
        

    <div class="ui pointing dropdown link item">

      <i class="asterisk icon"></i> Donantes <i class="dropdown icon"></i>
      <div class="menu">


        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/create">
          <i class="doble angle right icon"></i> Registrar Donante
        </a>


         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/admin">
          <i class="doble angle right icon"></i> Administrar Donantes
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/">
          <i class="doble angle right icon"></i> Listar Donantes
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

      <i class="asterisk icon"></i> Pacientes <i class="dropdown icon"></i>
      <div class="menu">
     

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/create">
          <i class="doble angle right icon"></i> Registrar Paciente
        </a>

       
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/admin">
          <i class="doble angle right icon"></i> Administrar Pacientes
        </a>


         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/">
          <i class="doble angle right icon"></i> Listar Pacientes
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/urgenciasnacionales">
          <i class="doble angle right icon"></i> Urgencias Nacionales
        </a>
       
       </div>       
    </div>


    <div class="ui pointing dropdown link item">

      <i class="asterisk icon"></i>  Donaciones <i class="dropdown icon"></i>
      <div class="menu">

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/donar">
          <i class="doble angle right icon"></i> Registrar Donación 
        </a>

        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionsangre/admin">
          <i class="doble angle right icon"></i> Adm. Donac. Sangre
        </a>
        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionmedula/admin">
          <i class="doble angle right icon"></i> Adm. Donac. Médula
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionorgano/admin">
          <i class="doble angle right icon"></i> Adm. Donac. Organo
        </a>    

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/bancosangre/admin">
          <i class="doble angle right icon"></i> Administrar Banco Sangre
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/organo/admin">
          <i class="doble angle right icon"></i> Administrar Organos
        </a>
        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionSangre/">
          <i class="doble angle right icon"></i> Listar Donac. Sangre
        </a>
        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionMedula/">
          <i class="doble angle right icon"></i> Listar Donac. Médula
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionOrgano/">
          <i class="doble angle right icon"></i> Listar Donac. Organo
        </a>    

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/bancoSangre/">
          <i class="doble angle right icon"></i> Listar Banco Sangre
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/organo/">
          <i class="doble angle right icon"></i> Listar Organos
        </a>
        
   
       </div>
       
    </div>
        

    <div class="ui pointing dropdown link item">

      <i class="asterisk icon"></i> Trasplantes <i class="dropdown icon"></i>
      <div class="menu">
         
         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/trasplante/create">
          <i class="doble angle right icon"></i> Registrar Trasplante
        </a>


        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/trasplante/admin">
          <i class="doble angle right icon"></i> Administrar Trasplantes
        </a>


        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/trasplante/">
          <i class="doble angle right icon"></i> Listar Trasplantes
        </a>


         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/asignar">
          <i class="doble angle right icon"></i> Asignar Trasplantes
         </a>

       </div>       
    </div>


 <div class="ui pointing dropdown link item">

      <i class="asterisk icon"></i> Centros Medicos <i class="dropdown icon"></i>
      <div class="menu">
         
         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centroMedico/create">
          <i class="doble angle right icon"></i> Registrar C. Medico
        </a>


        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centroMedico/admin">
          <i class="doble angle right icon"></i> Administrar C. Medicos
        </a>


        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centroMedico/">
          <i class="doble angle right icon"></i> Listar C. Medicos
        </a>

       </div>       
    </div>


  </div>


</div>

 <?php }  ?>


</div>
<div class="contenido">
  
  <?php echo $content; ?>

</div>


</body>

</html>