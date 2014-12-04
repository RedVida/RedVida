<?php
/* @var $this DonanteController */
/* @var $model Donante */

$this->breadcrumbs=array(
	'Paciente'=>array('index'),
	'Registrar Alergia',
);

$this->menu=array(
	array('label'=>'Listar Paciente', 'url'=>array('index')),
	array('label'=>'Registrar Paciente', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#donante-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
 Registrar Necesidad De Organo</h1>
</div>
<hr class="style-two ">

<?php echo CHtml::link('&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="ui grid">
	<div class="one wide column"></div>
	<div class="fourteen wide column">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'donante-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'nombre',
				'apellido',
				'rut',
		         array(
		            'class' => 'CButtonColumn',
		            'template'=>'{Registrar}', // botones a mostrar
		            'buttons'=>array(
					'Registrar' => array( //botón para la acción nueva
				    'label'=>'Registrar Organo', // titulo del enlace del botón nuevo
				    'url'=>'Yii::app()->createUrl("/paciente/registrar_necesidad_organo&id=$data->id")', //url de la acción nueva
				    //'visible'=>'($data->estado==="DISPONIBLE")?true:false;'
				    ),
					),
		          ),
			),
		)); ?>
	</div>
</div>		