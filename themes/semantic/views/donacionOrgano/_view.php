<div class="view">
	<div class="ui celled list">

	<?php  $modelo_d = Donantes::model()->find('id = '."'$data->id_donante'"); ?>

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

			<b><?php echo CHtml::encode('Estado Vital'); ?>:</b>
			<?php echo CHtml::encode($modelo_d->estado_vital); ?>
			<br />

			<b><?php echo CHtml::encode('Organo'); ?>:</b>
			<?php echo CHtml::encode($data->nombre); ?>
			<br />

			<b><?php echo CHtml::encode('Tipo Sangre'); ?>:</b>
			<?php echo CHtml::encode($modelo_d->tipo_sangre); ?>
			<br />

			<b><?php echo CHtml::encode('Fecha Donacion'); ?>:</b>
			<?php echo CHtml::encode($data->modified); ?>
			<br />

			<?php echo CHtml::link(CHtml::encode("Más Información"), array('view', 'id'=>$data->id)); ?>


		 </div>
	   </div>
	</div>
	</br>
</div>
