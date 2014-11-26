<div class="view">
	<div class="ui celled list">
	  <div class="item">
	    <i class="add large icon"></i> 
	    <div class="content">

		<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
		<?php echo CHtml::encode($data->tipo); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
		<?php echo CHtml::encode($data->cantidad); ?>
		<br />

		 </div>
	   </div>
	</div>
	</br>
</div>
