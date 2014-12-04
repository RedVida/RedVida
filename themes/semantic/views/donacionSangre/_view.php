<div class="view">
	
	<br>

	<div class="ui celled list">
	<?php  $modelo_d = Donantes::model()->find('id='.$data->id_donante); ?>
	  <div class="item">
	    <i class="add large icon"></i> 
	    <div class="content">

			<b><?php echo 'Nombre'; ?>:</b>
			<?php echo CHtml::encode($modelo_d['nombres']); ?>
			<br />

			<b><?php echo 'Apellido'; ?>:</b>
			<?php echo CHtml::encode($modelo_d['apellidos']); ?>
			<br />

			<b><?php echo 'Rut'; ?>:</b>
			<?php echo CHtml::encode($modelo_d->rut); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sangre')); ?>:</b>
			<?php echo CHtml::encode($data->tipo_sangre); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
			<?php echo CHtml::encode($data->cantidad); ?>
			<br/>
		  	
			<?php echo CHtml::link(CHtml::encode("Más Información"), array('view', 'id'=>$data->id)); ?>
			<br/>
		
		 </div>
	   </div>
	</div>
	</br>
</div>
