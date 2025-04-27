<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/principal.css" />

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.css" rel="stylesheet" media="screen">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/ubb.ico">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>


<div class="container" id="page">

<div class="row">
 <div class="col-md-4">
 	
 </div>
  <div class="col-md-8" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/clinica3.jpg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/text.png">
  </div>
 
</div>
	
	<!-- No tocar este menu: es el principal -->
    <nav class="navbar navbar-default">
        <div class="container">
        	<a class="navbar-brand"><?php echo Yii::app()->name; ?></a>
            <ul class="nav navbar-nav">
                <?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Iniciar Sesión'
					, 'url'=>Yii::app()->user->ui->loginUrl
					, 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Cerrar Sesión ('.Yii::app()->user->name.')'
					, 'url'=>Yii::app()->user->ui->logoutUrl
					, 'visible'=>!Yii::app()->user->isGuest),
    			
    			),
    			'htmlOptions' => array('class'=>'nav nav-tabs')
		)); ?>

            </ul><!--/.nav-collapse -->
        </div>
    </nav>


<?php
//Aca se ponen todos los item del menu de administrador

if(!Yii::app()->user->isGuest){ ?>
    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				array('label'=>'Administrar Usuarios'
					, 'url'=>Yii::app()->user->ui->userManagementAdminUrl),
                        array('label'=>'Gestión de Donantes', 'url'=>array('/donantes')),
                        array('label'=>'Donación Sangre', 'url'=>array('/donacionSangre')),
                        array('label'=>'Donación Médula', 'url'=>array('/donacionMedula')),
                        array('label'=>'Donación Organo', 'url'=>array('/donacionOrgano')),
                        array('label'=>'Gestión de Trasplantes', 'url'=>array('/trasplantes')),
                        array('label'=>'Gestión de Sangre', 'url'=>array('/bancoSangre')),
                        array('label'=>'Gestión de Organos', 'url'=>array('/organo')),
                        array('label'=>'Donar', 'url'=>array('/donantes/donar')),
                        array('label'=>'Centro Medico', 'url'=>array('/centromedico')),
                        array('label'=>'Enfermedad', 'url'=>array('/enfermedades')),
                        array('label'=>'Paciente', 'url'=>array('/paciente')),
    			),
				'htmlOptions' => array('class'=>'nav nav-tabs')
		)); ?>

            </ul><!--/.nav-collapse -->
        </div>
    </nav>
<?php }
?>



	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by MucaParadise<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
