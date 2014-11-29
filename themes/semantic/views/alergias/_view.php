<?php
/* @var $this AlergiasController */
/* @var $data Alergias */
?>

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
							<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
							<?php echo CHtml::encode($data->fecha_ingreso); ?>
							<br />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>						

