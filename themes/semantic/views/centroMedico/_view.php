<?php
/* @var $this CentroMedicoController */
/* @var $data CentroMedico */
?>

<div class="view">
	<div class="ui grid">
		<div class="one wide column"></div>
			<div class="twelve wide column">
				<div class="view">
					<div class="ui celled list">
 						 <div class="item">
    					 <i class="user large icon"></i> 
    						<div class="content">
								<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
								<?php echo CHtml::encode($data->nombre); ?>
								<br />

								<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
								<?php echo CHtml::encode($data->direccion); ?>
								<br />

								<b><?php echo CHtml::encode($data->getAttributeLabel('contacto')); ?>:</b>
								<?php echo CHtml::encode($data->contacto); ?>
								<br />

								<b><?php echo CHtml::encode($data->getAttributeLabel('director')); ?>:</b>
								<?php echo CHtml::encode($data->director); ?>
								<br />

								<b><?php echo CHtml::encode($data->getAttributeLabel('especialidad')); ?>:</b>
								<?php echo CHtml::encode($data->especialidad); ?>
								<br />

								<b><?php echo CHtml::encode($data->getAttributeLabel('gubernamental')); ?>:</b>
								<?php echo CHtml::encode($data->gubernamental); ?>
								<br />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>