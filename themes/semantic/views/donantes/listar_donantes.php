<?php  $this->layout="//layouts/index";?>
<?php
/* @var $this DonantesController */
/* @var $model Donantes */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#donantes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Registrar Donante </h1>
</div>
<hr class="style-two ">
<?php echo CHtml::link('&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form " style="display:none">

<?php $this->renderPartial('_search',array(
	'model'=>$model
)); ?>

<?php 
 function name_centro_medico($val){
		$centro_medico=CentroMedico::model()->find('id='.$val);
		return $centro_medico->nombre;
 }
$values= array();
$donantes=Donantes::model()->findAll('id_centro_medico!='.$this->getCM_user());
foreach($donantes as $r)$values[]=$r->id;

$criteria = new CDbCriteria();
$criteria->addInCondition('id',$values,'OR');
$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));
 $message='';
 if(!$values)$message="
						<div class ='ui warning message'>
							<i class='warning sign icon'></i>
							<i class='close icon'></i>
							<b>No se han encontrado Donantes en Otros Centros Medicos.
						</div> ";



?>
</div><!-- search-form -->
<div class="ui grid">
	<div class="one wide column"></div>
	<div class="fourteen wide column">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'donantes-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'nombres',
				'apellidos',
				'rut',
				'tipo_sangre',
				'num_contacto',
				'fecha_ingreso',
				'sexo',
				'edad',
				'id_centro_medico'=>array('header'=>'Centro Medico','name'=>'id_centro_medico', 'value'=>'name_centro_medico($data->id_centro_medico)'),
				array(
					'class'=>'CButtonColumn',
					 'buttons'=>array(
        						'delete' => array('visible' => 'false'),
        						'update' => array('visible' => 'false'),
				      ),
			    ),
		    ))); ?>
	</div>
</div>