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

   <?php //'success'  'error'  'notice'            
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                }
        }
        ?>
 <?php if(!Yii::app()->user->isGuest){ ?>
    
 <?php $cen =TieneCentroMedico::model()->find('id_user='.Yii::app()->user->id);
       $cen_main=CentroMedico::model()->find('id='.$cen->id_centro_medico);

  } ?>

  </head>

<body>

  <div class="ui small modal">
        <i class="close icon"></i>
          <div class="header">
            Verificar Operación
          </div>
        <div class="content">
          <i class="large loading icon"></i>
           Esta seguro que desea registrar estos datos?
        </div>
      <div class="actions">
        <div class="ui negative button" data-value="Cancel" name="Cancel">
          No
        </div>
        <div class="ui positive right labeled icon button"  date-value="Success" onclick="successModal();" name="Success">
          Si
          <i class="checkmark icon"></i>
        </div>
      </div>
  </div>

 

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

          <?php if(Yii::app()->user->isSuperAdmin){ ?>
    <a class="item" href="<?php echo Yii::app()->user->ui->userManagementAdminUrl; ?>">
      <i class="users icon"></i> Adm. de Usuario
    </a>
     <?php }?> 

      <div class="right menu">
      
      <?php if(!Yii::app()->user->isGuest){ ?>

        <a class="item" style="pointer-events:none">
        <i class="building outline icon"></i>
       <?php echo $cen_main->nombre;?>
      </a>      

    
      <a class="item" style="pointer-events:none">
        <i class="user icon"></i> 
       <?php echo Yii::app()->user->name;?>
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

     <div class="ui pointing dropdown link item">

      <i class="asterisk icon"></i> Alergias <i class="dropdown icon"></i>
      <div class="menu">
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/alergias/create">
          <i class="doble angle right icon"></i> Registrar Alergia
        </a>
        <?php } ?>
         <?php if(Yii::app()->user->checkAccess('tester')){ ?>
         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/alergias/admin">
          <i class="doble angle right icon"></i> Administrar Alergias
        </a>
        <?php } ?>
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/alergias/informe">
          <i class="doble angle right icon"></i> Generar Informe
        </a>
        <?php } ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/alergias/">
          <i class="doble angle right icon"></i> Listar Alergias
        </a>
        
         
        

       </div>     
    </div>

    <div class="ui pointing dropdown link item">

          <i class="asterisk icon"></i> Centros Medicos <i class="dropdown icon"></i>
          <div class="menu">
            <?php if(Yii::app()->user->checkAccess('tester')){ ?>
             <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centroMedico/create">
              <i class="doble angle right icon"></i> Registrar C. Medico
            </a>
            <?php } ?>
            <?php if(Yii::app()->user->checkAccess('tester')){ ?>
            <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centroMedico/admin">
              <i class="doble angle right icon"></i> Administrar C. Medicos
            </a>
            <?php } ?>
            <?php if(Yii::app()->user->checkAccess('tester')){ ?>
             <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centroMedico/informe">
              <i class="doble angle right icon"></i> Generar Informe
            </a>
            <?php } ?>
            <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/centroMedico/">
              <i class="doble angle right icon"></i> Listar C. Medicos
            </a>
             
             
          </div>       
      </div>  

    <?php if(Yii::app()->user->checkAccess('tester')){ ?>
    <div class="ui pointing dropdown link item">

      <i class="asterisk icon"></i>  Donaciones <i class="dropdown icon"></i>
      <div class="menu">

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/bancoSangre/admin">
          <i class="doble angle right icon"></i> Listar Banco Sangre
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/donar_medula">
          <i class="doble angle right icon"></i> Registrar Donación Medula
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/donar_organo">
          <i class="doble angle right icon"></i> Registrar Donación Organo
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/donar_sangre">
          <i class="doble angle right icon"></i> Registrar Donación Sangre
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionMedula/informe">
          <i class="doble angle right icon"></i> Generar Informe D.Medula
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionOrgano/informe">
          <i class="doble angle right icon"></i> Generar Informe D.Organo
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionSangre/informe">
          <i class="doble angle right icon"></i> Generar Informe D.Sangre
        </a>
        
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionMedula/admin">
          <i class="doble angle right icon"></i> Administrar Donac. Médula
        </a>

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionOrgano/admin">
          <i class="doble angle right icon"></i> Administrar Donac. Órgano
        </a> 

        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donacionSangre/admin">
          <i class="doble angle right icon"></i> Administrar Donac. Sangre
        </a>   

      
       </div>  
    </div>
        <?php } ?>

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
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/registra_alergia">
          <i class="doble angle right icon"></i> Asignar Alergia 
        </a>
        <?php } ?>
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/registraenfermedad">
          <i class="doble angle right icon"></i> Asignar Enfermedad 
        </a>
        <?php } ?> 
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/informe">
          <i class="doble angle right icon"></i> Generar Informe
        </a>
        <?php } ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/">
          <i class="doble angle right icon"></i> Listar Donantes
        </a>

        
        
      
       </div>     
    </div>

    <div class="ui pointing dropdown link item">

      <i class="asterisk icon"></i> Enfermedades <i class="dropdown icon"></i>
      <div class="menu">

        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/enfermedades/create">
          <i class="doble angle right icon"></i> Registrar Enfermedades
        </a>
        <?php } ?>
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/enfermedades/admin">
          <i class="doble angle right icon"></i> Administrar Enfermedades
        </a>
        <?php } ?>
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
         <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/enfermedades/informe">
          <i class="doble angle right icon"></i> Generar Informe
        </a>
        <?php } ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/enfermedades/">
          <i class="doble angle right icon"></i> Listar Enfermedades
        </a>

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
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/registra_organo">
          <i class="doble angle right icon"></i> Asignar Necesidad (Organo)
        </a>
        <?php } ?>
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/registra_medula">
          <i class="doble angle right icon"></i> Asignar Necesidad (Medula)
        </a>
        <?php } ?>
        <?php if(Yii::app()->user->checkAccess('tester')){ ?>
        <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/informe">
          <i class="doble angle right icon"></i> Generar Informe
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

          <i class="asterisk icon"></i> Trasplantes <i class="dropdown icon"></i>
          <div class="menu">
           
           <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/asignar">
            <i class="doble angle right icon"></i> Registrar Trasplante
          </a>


          <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/trasplante/admin">
            <i class="doble angle right icon"></i> Administrar Trasplantes
          </a>

          <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/transfusion/admin">
            <i class="doble angle right icon"></i> Administrar Transfusiones
          </a>

          <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/trasplante/informe">
            <i class="doble angle right icon"></i> Generar Informe


          <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/trasplante/">
            <i class="doble angle right icon"></i> Listar Trasplantes
          </a>

          </div>       
      </div>
      <?php } ?>

       <?php if(Yii::app()->user->checkAccess('tester')){ ?>

      <div class="ui pointing dropdown link item">

          <i class="asterisk icon"></i> Ver <i class="dropdown icon"></i>
          <div class="menu">
           
           <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/donantes/listar_donantes">
            <i class="doble angle right icon"></i> Listar Otros Donantes
          </a>


          <a class="item"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/paciente/listar_pacientes">
            <i class="doble angle right icon"></i> Listar Otros Pacientes
          </a>

          </div>       
      </div>
      <?php } ?>

      


    </div><!--END MENU-->
</div><!--END MENU  INVERTED-->

  <?php }  ?>
  
</div>

<div class="contenido">
  
  <?php echo $content; ?>

</div>

</body>

</html>