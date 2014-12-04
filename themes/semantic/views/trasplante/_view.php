<?php
/* @var $this TrasplanteController */
/* @var $data Trasplante */
?>

<div class="view">
	<div class="ui celled list">
	  <div class="item">
	    <i class="add large icon"></i> 
	    <div class="content">

	 <b><?php echo CHtml::encode($data->getAttributeLabel('Trasplante de')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
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