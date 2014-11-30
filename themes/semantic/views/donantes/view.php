<?php
/* @var $this DonantesController */
/* @var $model Donantes */

$this->menu=array(
	array('label'=>'Administrar Donantes', 'url'=>array('admin')),
	array('label'=>'Editar Donante', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Donante', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea elminar este Donante?')),
	array('label'=>'Listar Donantes', 'url'=>array('index')),
	array('label'=>'Registrar Alergia', 'url'=> array('registrar_alergia', 'id'=> $model->id)),
	array('label'=>'Registrar Enfermedad', 'url'=> array('registrarenfermedad', 'id'=> $model->id)),
	
);?>

<div class="ui black ribbon label">
	<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
	Donante: <?php echo $model->nombres.' '.$model->apellidos ;  ?></h1>
</div>
<hr class="style-two ">
<div class="ui grid">
	<div class="one wide column"></div>
	<div class="twelve wide column">

		<?php $centro_medico=CentroMedico::model()->find('id='.$model->id_centro_medico);?>
		
		<!-- enfermedades -->

		<?php 
		$array_enfermedad = array();
	    $Criteria = new CDbCriteria();
	    $Criteria->condition = "id_donante = $model->id"; 
	    $enfermedad= TieneEnfermedad::model()->findAll($Criteria);
	    if(!$enfermedad)$array_enfermedad = array('No presenta');
	    foreach ($enfermedad as $valor) 
	    	{

			    $enfer=Enfermedades::model()->find('id='.$valor->id_enfermedad);
			    $array_enfermedad[]=$enfer->nombre;
	    	}     
	    $enfermedad = implode(", ", $array_enfermedad); ?>

	    <!-- Alergias-->

	    <?php
	    $array_alergia = array(); 
	    $Criteria = new CDbCriteria();
	    $Criteria->condition = "id_donante = $model->id"; 
	    $alergias= TieneAlergia::model()->findAll($Criteria);
	    if(!$alergias)$array_alergia = array('No presenta');
	    foreach ($alergias as $valor) 
	    	{
			    $alergia=Alergias::model()->find('id='.$valor->id_alergia);
				$array_alergia[]=$alergia->nombre;
	    	}     
	    $alergias = implode(", ", $array_alergia); ?>

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
			'nombres',
			'apellidos',
			'rut',
			'tipo_sangre',
			'email',
			'direccion',
			'num_contacto',
			'fecha_ingreso',
			'fecha_nacimiento',
			'edad',
			'centro_medico'=>array('name'=>'Centro Medico','value' => $centro_medico->nombre),
			'Enfermedades'=>array('name'=>'Enfermedad(es)','value'=> $enfermedad),
			'Alergias'=>array('name'=>'Alergia(s)','value'=> $alergias)
			),
			'htmlOptions'=>array('class'=>'ui celled table segment'),
		)); ?>

	</div>
</div>
<hr class="style-two ">