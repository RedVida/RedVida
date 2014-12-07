<?php
/* @var $this DonantesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Donantes',
);
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Administrar Donantes', 'url'=>array('admin')),
	array('label'=>'Generar Informe', 'url'=>array('informe')),
	array('label'=>'Registrar Donantes', 'url'=>array('create')),
);
}
?>

<br>
<div class="ui black ribbon label">
	<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Lista De Donantes </h1>
</div> 

<?php
$centro_medico=CentroMedico::model()->find('id='.$this->getCM_user());
if($dataProvider) $message="
						<div class='ui grid'>
							<div class='one wide column'></div>
							<div class='fourteen wide column'>
							<div class ='ui warning message'>
								<i class='warning sign icon'></i>
								<i class='close icon'></i>
								<b>No se han encontrado Donantes en este Centro Medico (".$centro_medico->nombre.").</b>
							</div>
							</div>
						</div>";
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'emptyText'=>$message,
)); ?>
