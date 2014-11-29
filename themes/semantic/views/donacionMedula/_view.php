<div class="view">
	<div class="ui celled list">
	  <div class="item">
	    <i class="add large icon"></i> 
	    <div class="content">

		<b><?php echo CHtml::encode($data->getAttributeLabel('rut_donante')); ?>:</b>
		<?php echo CHtml::encode($data->rut_donante); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_medula')); ?>:</b>
		<?php echo CHtml::encode($data->tipo_medula); ?>
		<br />

		<?php echo CHtml::link(CHtml::encode("Más Información"), array('view', 'id'=>$data->id)); ?>
		<br/>
		 </div>
	   </div>
	</div>
	</br>
</div>
