<?php
$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Paciente', 'url'=>array('index')),
	array('label'=>'Registrar Paciente', 'url'=>array('create')),
	array('label'=>'Actualizar Paciente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Administrar Paciente', 'url'=>array('admin')),
);
?>
<br>
<div class="ui black ribbon label">
	<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
	Paciente: <?php echo $model->nombre.' '.$model->apellido ;  ?></h1>
</div>
<hr class="style-two ">
<div class="ui grid">
	<div class="one wide column"></div>
	<div class="twelve wide column">
<?php 
    $centro_medico=CentroMedico::model()->find('id='.$model->id_centro_medico);
    //$organo=Organo::model()->find('idOrgano='.$model->necesidad_trasplante);
    
?>

	<?php 
		$array_enfermedad = array();
	    $Criteria = new CDbCriteria();
	    $Criteria->condition = "id_paciente = $model->id"; 
	    $enfermedad= EnfermedadPaciente::model()->findAll($Criteria);
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
	    $Criteria->condition = "id_paciente = $model->id"; 
	    $alergias= AlergiaPaciente::model()->findAll($Criteria);
	    if(!$alergias)$array_alergia = array('No presenta');
	    foreach ($alergias as $valor) 
	    	{
			    $alergia=Alergias::model()->find('id='.$valor->id_alergia);
				$array_alergia[]=$alergia->nombre;
	    	}     
	    $alergias = implode(", ", $array_alergia); 
		?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'apellido',
		'rut',
		'afiliacion',
		'fecha_nacimiento',
		'edad',
		'tipo_sangre',
		array(
			'label'=>'Centro Medico',
			'type'=>'raw',
			'value'=>CHtml::link(CHtml::encode($centro_medico->nombre),
                                 array('centromedico/view','id'=>$centro_medico->id)),
		),
		'Enfermedades'=>array('name'=>'Enfermedad(es)','value'=> $enfermedad),
		'Alergias'=>array('name'=>'Alergia(s)','value'=> $alergias)
		),
		'htmlOptions'=>array('class'=>'ui celled table segment'),
		)); 
?>
	</div>
</div>

     
    
