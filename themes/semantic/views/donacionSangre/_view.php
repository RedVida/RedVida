<div class="view">
	


	<br>


			
	<div class="ui celled list">

	
<div class="ui inverted green vertical segment">
  <div class="ui page grid">
    <div class="column">
      <h2 class="ui inverted header"><?php $modelo_d = Donantes::model()->find('rut = '."'$data->rut_donante'");
			echo $modelo_d['nombres']; ?></h2>
      
		
    </div>
  </div>
</div>

	  <div class="item">
	    <i class="add large icon"></i> 
	    <div class="content">

	

			<b><?php echo CHtml::encode($data->getAttributeLabel('rut_donante')); ?>:</b>
			<?php echo CHtml::encode($data->rut_donante); ?>
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
