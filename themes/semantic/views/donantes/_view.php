<?php
/* @var $this DonantesController */
/* @var $data Donantes */
?>
<div class="ui grid">
	<div class="one wide column"></div>
		<div class="twelve wide column">
			<div class="view">
				<div class="ui celled list">
 					 <div class="item">
    				 <i class="user large icon"></i> 
    					<div class="content">
						    <b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
							<?php echo CHtml::encode($data->nombres); ?>
							<br />
						  
							<b><?php echo CHtml::encode($data->getAttributeLabel('apellidos')); ?>:</b>
							<?php echo CHtml::encode($data->apellidos); ?>
							<br />

							<b><?php echo CHtml::encode($data->getAttributeLabel('rut')); ?>:</b>
							<?php echo CHtml::encode($data->rut); ?>
							<br />

							<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sangre')); ?>:</b>
							<?php echo CHtml::encode($data->tipo_sangre); ?>
							<br />

							<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
							<?php echo CHtml::encode($data->email); ?>
							<br />

							<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
							<?php echo CHtml::encode($data->direccion); ?>
							<br />

							<b><?php echo CHtml::encode($data->getAttributeLabel('centro_medico')); ?>:</b>
							<?php 
						    $centro_medico=CentroMedico::model()->find('id='.$data->id_centro_medico);
							echo $centro_medico->nombre; ?>
							<br />

							<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
							<?php echo CHtml::encode($data->fecha_nacimiento); ?>
							<br />

							<b><?php echo CHtml::encode($data->getAttributeLabel('edad')); ?>:</b>
							<?php echo CHtml::encode($data->edad); ?>
							<br />

						    <!-- Enfermedades--> <!-- Enfermedades-->

							<b><?php 
						    $Criteria = new CDbCriteria();
						    $Criteria->condition = "id_donante = $data->id"; 
						    $enfermedad= TieneEnfermedad::model()->findAll($Criteria);
						    if($enfermedad){ echo 'Enfermedad(es):';}
						    else{ echo 'Enfermedad(es): No presenta';} ?></b>
						    </br>
						 
							<?php 
						    foreach ($enfermedad as $valor) 
						    	{
								    $enfer=Enfermedades::model()->find('id='.$valor->id_enfermedad);
								    ?><i class="angle right icon"></i><?php
								    echo " ".CHtml::link($enfer->nombre,'index.php?r=enfermedades/view&id='.$enfer->id);
								    ?></br><?php
						    	}     
						    ?>
						    <!-- Alergias-->
						    <?php if(isset($_GET['pdf'])){?>
						    <br> <?php } ?>
						    <b><?php 
						    $Criteria = new CDbCriteria();
						    $Criteria->condition = "id_donante = $data->id"; 
						    $alergias= TieneAlergia::model()->findAll($Criteria);
						    if($alergias){ echo 'Alergia(s):';}
						    else{ echo 'Alergia(s): No presenta';} ?></b>
						    </br>
						 
							<?php 
						    foreach ($alergias as $valor) 
						    	{
								    $alergia=Alergias::model()->find('id='.$valor->id_alergia);
								    ?><i class="angle right icon"></i><?php
								    echo " ".CHtml::link($alergia->nombre,'index.php?r=alergias/view&id='.$alergia->id);
								    ?></br><?php
						    	}     
						    ?>

						    <?php echo CHtml::link(CHtml::encode("Más Información"), array('view', 'id'=>$data->id)); ?>
						     
						    
    					</div>
  					</div>
				</div>
			</div>
		</div>
	<br>
</div>