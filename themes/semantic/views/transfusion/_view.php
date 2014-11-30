
<div class="view">
	<div class="ui celled list">
	  <div class="item">
	    <i class="add large icon"></i> 
	    <div class="content">


		<b><?php echo "Paciente" ?>:</b>
		<?php $modelo_paciente = Paciente::model()->find('rut='."'$data->rut_paciente'");
		echo $modelo_paciente['nombre'].' '.$modelo_paciente['apellido']; ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('rut_paciente')); ?>:</b>
		<?php echo CHtml::encode($data->rut_paciente); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sangre')); ?>:</b>
		<?php echo CHtml::encode($data->tipo_sangre); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
		<?php echo CHtml::encode($data->cantidad); ?>
		<br />

		<?php echo CHtml::link(CHtml::encode("Más Información"), array('view', 'id'=>$data->id)); ?>
		<br/>

	</div>
	</div>
</div>
</br>
</div>