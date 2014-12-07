<?php
/* @var $this TrasplanteController */
/* @var $dataProvider CActiveDataProvider */
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Registrar Trasfusión', 'url'=>array('/paciente/asignar')),
	array('label'=>'Administrar Transfusiones', 'url'=>array('admin')),
);
}
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Transfusiones </h1>
</div>
<hr class="style-two ">

<div class="ui grid"><!--start grid-->

	<div class="one wide column">
	</div>

	<div class="twelve wide column">
<?php 
$centro_medico=CentroMedico::model()->find('id='.$this->getCM_user());
if($dataProvider) $message="
						<div class='ui grid'>
							<div class='one wide column'></div>
							<div class='fourteen wide column'>
							<div class ='ui warning message'>
								<i class='warning sign icon'></i>
								<i class='close icon'></i>
								<b>No se han encontrado Transfusiones De Sangre en este Centro Medico (".$centro_medico->nombre.").</b>
							</div>
							</div>
						</div>";
?>	
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
		'emptyText'=>$message,
	)); ?>

	</div>
</div>
<hr class="style-two ">
