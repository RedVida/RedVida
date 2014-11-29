<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es">

<head>

  <!-- Standard Meta -->
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="es" />

  <!-- Site Properities -->
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">  
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/carousel.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/views/layouts/main.css">   
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/modal.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/estilos.css">
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/jquery.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/carousel.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/semantic.min.js"></script>  
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/views/layouts/main.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/jquery.tablesort.min.js"></script>

<div class="ui center aligned segment">
<img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/clinica3.jpg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/text.png">
</div>

</head>

<body>


<!-- Meno As DropDown -->

<div class="ui blue inverted menu">
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


<?php if(!Yii::app()->user->isGuest){ ?>
<div class="ui blue inverted menu "> <!--BEGIN MENU INVERTED-->
  <div class="menu"><!--BEGIN MENU-->
  <?php if(Yii::app()->user->isSuperAdmin){ ?>
    <a class="item" href="<?php echo Yii::app()->user->ui->userManagementAdminUrl; ?>">
      <i class="asterisk icon"></i> Adm. de Usuario
    </a>
    <?php }?>

    <div class="ui pointing dropdown link item">

      <i class="asterisk icon"></i> Donantes <i class="dropdown icon"></i>
      <div class="menu">

        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/create">
          <i class="doble angle right icon"></i> Registrar Donante
        </a>
        <?php } ?>
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/admin">
          <i class="doble angle right icon"></i> Administrar Donantes
        </a>
        <?php } ?>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/">
          <i class="doble angle right icon"></i> Listar Donantes
        </a>

        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/registraenfermedad">
          <i class="doble angle right icon"></i> Asignar Enfermedad 
        </a>
        <?php } ?>
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/registra_alergia">
          <i class="doble angle right icon"></i> Asignar Alergia 
        </a>
        <?php } ?>
       </div>     
    </div>


    <div class="ui pointing dropdown link item">

      <i class="asterisk icon"></i> Pacientes <i class="dropdown icon"></i>
      <div class="menu">
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/create">
          <i class="doble angle right icon"></i> Registrar Paciente
        </a>
        <?php } ?>
       <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/admin">
          <i class="doble angle right icon"></i> Administrar Pacientes
        </a>
        <?php } ?>

         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/">
          <i class="doble angle right icon"></i> Listar Pacientes
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/urgenciasnacionales">
          <i class="doble angle right icon"></i> Urgencias Nacionales
        </a>
       
       </div>       
    </div>


    <?php if(Yii::app()->user->checkAccess('tester')){ ?>
    <div class="ui pointing dropdown link item">

      <i class="asterisk icon"></i>  Donaciones <i class="dropdown icon"></i>
      <div class="menu">

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/donar">
          <i class="doble angle right icon"></i> Registrar Donación 
        </a>

        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionSangre/admin">
          <i class="doble angle right icon"></i> Adm. Donac. Sangre
        </a>
        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionMedula/admin">
          <i class="doble angle right icon"></i> Adm. Donac. Médula
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionOrgano/admin">
          <i class="doble angle right icon"></i> Adm. Donac. Órgano
        </a>    

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/bancosangre/admin">
          <i class="doble angle right icon"></i> Administrar Banco Sangre
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/organo/admin">
          <i class="doble angle right icon"></i> Administrar Órganos
        </a>
        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionSangre/">
          <i class="doble angle right icon"></i> Listar Donac. Sangre
        </a>
        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionMedula/">
          <i class="doble angle right icon"></i> Listar Donac. Médula
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionOrgano/">
          <i class="doble angle right icon"></i> Listar Donac. Órgano
        </a>    

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/bancoSangre/">
          <i class="doble angle right icon"></i> Listar Banco Sangre
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/organo/">
          <i class="doble angle right icon"></i> Listar Órganos
        </a>
      
       </div>  
    </div>
        <?php } ?>
        

      <?php if(Yii::app()->user->checkAccess('tester')){ ?>

      <div class="ui pointing dropdown link item">

          <i class="asterisk icon"></i> Trasplantes <i class="dropdown icon"></i>
          <div class="menu">
           
           <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/asignar">
            <i class="doble angle right icon"></i> Registrar Trasplante
          </a>


          <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/trasplante/admin">
            <i class="doble angle right icon"></i> Administrar Trasplantes
          </a>


          <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/trasplante/">
            <i class="doble angle right icon"></i> Listar Trasplantes
          </a>

          </div>       
      </div>
      <?php } ?>


      <div class="ui pointing dropdown link item">

          <i class="asterisk icon"></i> Centros Médicos <i class="dropdown icon"></i>
          <div class="menu">
             <?php if(Yii::app()->user->checkAccess('tester')){ ?>
             <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centroMedico/create">
              <i class="doble angle right icon"></i> Registrar C. Médico
            </a>
            <?php } ?>
            <?php if(Yii::app()->user->checkAccess('tester')){ ?>
            <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centroMedico/admin">
              <i class="doble angle right icon"></i> Administrar C. Médicos
            </a>
            <?php } ?>

            <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centroMedico/">
              <i class="doble angle right icon"></i> Listar C. Médicos
            </a>

          </div>       
      </div>


    </div><!--END MENU-->
</div><!--END MENU  INVERTED-->

  <?php }  ?>
  
</div>

<div class="contenido">
  
  <?php echo $content; ?>

</div>

</body>

</html>