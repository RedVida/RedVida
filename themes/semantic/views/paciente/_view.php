<?php
/* @var $this PacienteController */
/* @var $data Paciente */
$organo = Organo::model()->findAll(array('select'=>'nombreOrgano'));

$this->menu=array(
	array('label'=>'Lista Paciente', 'url'=>array('index')),
	array('label'=>'Registrar Paciente', 'url'=>array('create')),
	array('label'=>'Administrar Paciente', 'url'=>array('admin')),
);

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

			<?php echo CHtml::encode($data->apellido); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('Rut')); ?>:</b>
			<?php echo CHtml::encode($data->rut); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
			<?php echo CHtml::encode($data->fecha_nacimiento); ?>
			<br />

			<b><?php echo 'Centro Medico'; ?>:</b>
			<?php $centro_medico=CentroMedico::model()->find('id='.$data->id_centro_medico);
				  echo $centro_medico->nombre; ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('edad')); ?>:</b>
			<?php echo CHtml::encode($data->edad); ?>
			<br />

			<?php echo CHtml::link(CHtml::encode("Más detalle"), array('view', 'id'=>$data->id)); ?>
			<br/>

			<br/>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sangre')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_sangre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_centro_medico')); ?>:</b>
	<?php echo CHtml::encode($data->id_centro_medico); ?>
	<br />

	*/ ?>

</div>
</div>
</div>
</div>
</div>
</div>