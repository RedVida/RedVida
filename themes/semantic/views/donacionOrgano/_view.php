<div class="view">
	<div class="ui celled list">

	<?php  $modelo_d = Donantes::model()->find('rut = '."'$data->rut_donante'"); ?>

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
			<?php echo CHtml::encode($data->rut_donante); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
			<?php echo CHtml::encode($data->nombre); ?>
			<br />

			<?php echo CHtml::link(CHtml::encode("Más Información"), array('view', 'id'=>$data->id)); ?>


		 </div>
	   </div>
	</div>
	</br>
</div>
