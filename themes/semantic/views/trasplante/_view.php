<?php
/* @var $this TrasplanteController */
/* @var $data Trasplante */
?>

<div class="view">
	<div class="ui celled list">
	  <div class="item">
	    <i class="add large icon"></i> 
	    <div class="content">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo De Trasplante')); ?>:</b>
	<?php $tipo_trasplante=TipoTrasplante::model()->find('id='.$data->id_tipo_trasplante);
	 echo $tipo_trasplante->nombre;
	 ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Centro Medico')); ?>:</b>
	<?php $centro_medico=CentroMedico::model()->find('id='.$data->id_centro_medico); 
	echo $centro_medico->nombre; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha de ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha de modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Donante')); ?>:</b>
		<?php 
				if($data->id_tipo_trasplante== 1){
				$donador=DonacionOrgano::model()->find('id='.$data->id_tipo_trasplante);
				}
				if($data->id_tipo_trasplante== 2){
				$donador=DonacionMedula::model()->find('id='.$data->id_tipo_trasplante);
				}
				if($data->id_tipo_trasplante== 3){
				$donador=DonacionSangre::model()->find('id='.$data->id_tipo_trasplante);
				}
				$donante=Donantes::model()->find('rut='."'$donador->rut_donante'");
				echo $donante['nombres'].' '.$donante['apellidos'];	
 		?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Paciente')); ?>:</b>
	<?php $paciente=Paciente::model()->find('id='.$data->id_paciente); 
	echo $paciente->nombre.' '.$paciente->apellido ?>
	<br />
	
	<?php echo CHtml::link(CHtml::encode("Más Información"), array('view', 'id'=>$data->id)); ?>
	<br/>
  	
  		</div>
	</div>
</div>
</br>
</div>