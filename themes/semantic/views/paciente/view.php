
<?php
$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->id,
);
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Lista Paciente', 'url'=>array('index')),
	array('label'=>'Registrar Paciente', 'url'=>array('create')),
	array('label'=>'Actualizar Paciente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Administrar Paciente', 'url'=>array('admin')),
);
}
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

		<!-- ORgano-->

	    <?php
	    $array_necesidad = array(); 
	    $Criteria = new CDbCriteria();
	    $Criteria->condition = "id_paciente = $model->id"; 
	    $necesidad_organo= NecesidadOrgano::model()->findAll($Criteria);
	    if(!$necesidad_organo)$array_necesidad = array('No presenta');
	    foreach ($necesidad_organo as $valor) 
	    	{
			    $val_organo=Organo::model()->find('idOrgano='.$valor->id_organo);
				$array_necesidad[]=$val_organo->nombreOrgano;
	    	}     
	    $organo= implode(" - ", $array_necesidad); 
		?>

		<!-- ORgano-->

	    <?php
	    $necesidad_medula='No presenta';
	    if($medula=NecesidadMedula::model()->find('id_paciente='.$model->id))
	    	$necesidad_medula='Medula Osea';
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
		'sexo',
		array(
			'label'=>'Centro Medico',
			'type'=>'raw',
			'value'=>CHtml::link(CHtml::encode($centro_medico->nombre),
                                 array('centromedico/view','id'=>$centro_medico->id)),
		),
		'Enfermedades'=>array('name'=>'Enfermedad(es)','value'=> $enfermedad),
		'Alergias'=>array('name'=>'Alergia(s)','value'=> $alergias),
		'Necesidad Trasplante (Organo) '=>array('name'=>'Necesidad Trasplante (Organo )','value'=> $organo),
		'Necesidad Trasplante (Medula) '=>array('name'=>'Necesidad Trasplante (Medula )','value'=> $necesidad_medula),

		),
		'htmlOptions'=>array('class'=>'ui celled table segment'),
		)); 
?>
	</div>
</div>

     
    
