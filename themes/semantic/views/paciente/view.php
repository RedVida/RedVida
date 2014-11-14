<?php
/* @var $this PacienteController */
/* @var $model Paciente */

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

<h1>Paciente: <?php echo $model->nombre." ".$model->apellido; ?></h1>
<?php 
    $centro_medico=CentroMedico::model()->find('id='.$model->id_centro_medico);
    $organo=Organo::model()->find('idOrgano='.$model->necesidad_transplante);
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rut',
		'afiliacion',
		'grado_urgencia',
		array(
			'label'=>'Necesidad Transplante',
			'type'=>'raw',
			'value'=>$organo->nombreOrgano,
		),
		'tipo_sangre',
		array(
			'label'=>'Centro Medico',
			'type'=>'raw',
			'value'=>CHtml::link(CHtml::encode($centro_medico->nombre),
                                 array('centromedico/view','id'=>$centro_medico->id)),
		),
))); ?>

<b><?php echo 'Enfermedad(es)'; ?>:</b>
    </br>
 
	<?php 
    $Criteria = new CDbCriteria();
    $Criteria->condition = "id_paciente = $model->id"; 
    $enfermedad= EnfermedadPaciente::model()->findAll($Criteria);
    foreach ($enfermedad as $valor) 
    	{
		    $enfer=Enfermedades::model()->find('id='.$valor->id_enfermedad);
		    ?><i class="angle right icon"></i><?php
		    echo " ".CHtml::link($enfer->nombre,'index.php?r=enfermedades/view&id='.$enfer->id);
		    ?></br><?php
    	}     
    ?>
